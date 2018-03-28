<?php
/**
 * Created by PhpStorm.
 * User: SAURON
 * Date: 3/27/2018
 * Time: 10:12 PM
 */

namespace app\components;

use app\models\Users;
use DrewM\MailChimp\MailChimp;
use ForceUTF8\Encoding;
use Yii;
use yii\caching\FileCache;
use yii\caching\FileDependency;
use yii\validators\EmailValidator;

class MailchimpComponent
{
    //public $apikey;
    public $mc;


    /**
     * MailchimpComponent constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        //$this->apikey = $apiKey;
        $mailchimpKey = Yii::$app->params['mailchimp'];
        $this->mc = new MailChimp($mailchimpKey);
    }

    public function GetLists()
    {
        $cache = new FileCache();
        $mailingLists = [];

        $dependency = new FileDependency(['fileName' => 'customer_lists.txt']);

        $cacheKey = 'lists';

        $data = $cache->get($cacheKey);
        if ($data === false) {
            // $data is not found in cache, calculate it from scratch
            $result = $this->mc->get('lists');

            $lists = isset($result['lists']) ? $result['lists'] : [];
            foreach ($lists as $key => $list) {
                $mailingLists[$list['id']] = $list['name'];
            }

            asort($mailingLists);
            // store $data in cache so that it can be retrieved next time
            //keep for 3600 seconds
            $cache->set($cacheKey, $mailingLists, '3600', $dependency);
        } else {

            $mailingLists = $data;
        }
        return $mailingLists;
    }

    public function AddSubscribers($list_id, array $membersToAdd)
    {
        /* @var $customer Users */

        $batch = $this->mc->new_batch($list_id);
        foreach ($membersToAdd as $key => $customer) {
            $firstname = $this->encodeToUTF8(ucfirst(strtolower($customer->SURNAME)));
            $lastname = $this->encodeToUTF8(ucfirst(strtolower($customer->OTHER_NAMES)));

            $email = $this->encodeToUTF8(strtolower($customer->EMAIL));

            if ($this->isValidEmail($email)) {
                $batch->post("op{$key}", "lists/$list_id/members", [
                    'email_address' => $email,
                    'merge_fields' => ['FNAME' => $firstname, 'LNAME' => $lastname],
                    'status' => 'subscribed',
                ]);
            }
        }
        $result = $batch->execute();

        return $result;
    }

    public function DeactivateMembers($list_id, array $membersToRemove)
    {
        $batch = $this->mc->new_batch($list_id);
        /* @var $customer Users */
        foreach ($membersToRemove as $key => $customer) {
            $email = strtolower($customer->EMAIL);
            $subscriber_hash = $this->mc->subscriberHash($email);

            $batch->delete("op{$key}", "lists/$list_id/members/$subscriber_hash");
        }

        $result = (object)$batch->execute();

        return $result;
    }

    public function CheckBatchStatus($batch_id)
    {
        $batch = $this->mc->new_batch($batch_id);
        return $batch->check_status();
    }

    public function ComposeCampaignMessage($list_id, $subject, $htmlMessage, $textMessage, $title, $replyTo = 'support@pizzaout.so')
    {

        $campaignID = $this->CreateCampaign($list_id, $subject, $replyTo, $title);

        //$campaignID = '9e94d0c00d';
        $this->SetCampaignContent($campaignID, $subject, $htmlMessage, $textMessage);
    }

    public function CreateCampaign($list_id, $subject, $replyTo, $title)
    {
        $result = $this->mc->post("campaigns", [
            'type' => 'regular',
            'recipients' => ['list_id' => $list_id],
            'settings' => [
                //"reply_to":"orders@mammothhouse.com","from_name":"Customer Service"
                'subject_line' => $subject,
                'title' => $title,
                'from_name' => 'PizzaOut',
                'reply_to' => $replyTo,
            ]
        ]);

        //$response = $this->mc->getLastResponse();
        //echo '<pre>';
        //var_dump($result);

        return $result['id'];
    }

    /**
     * @param $campaign_id
     * @param $subject
     * @param $htmlMessage
     * @param $textMessage
     * @return array|false|null
     */
    private function SetCampaignContent($campaign_id, $subject, $htmlMessage, $textMessage)
    {
        $result = $this->mc->put("campaigns/$campaign_id/content", [
            'template' => [
                'id' => 277589,
                'sections' => [
                    'title' => $subject,
                    'body' => $htmlMessage
                ],
            ],
            'plain_text' => $textMessage,
            'text' => $textMessage
        ]);

        return $result != false ? $this->SendCampaign($campaign_id) : null;
    }

    /**
     * @param $campaign_id
     * @return array|false
     */
    private function SendCampaignChecklist($campaign_id)
    {
        return $this->mc->get("campaigns/$campaign_id/send-checklist");
    }

    /**
     * @param $campaign_id
     * @return array|false
     */
    private function SendCampaign($campaign_id)
    {
        $result = $this->mc->post("campaigns/$campaign_id/actions/send");

        return $result;
    }

    /**
     * @param $email
     * @return bool
     */
    private function isValidEmail($email)
    {
        $validator = new EmailValidator();

        return $validator->validate($email);
    }

    /**
     * @param $string
     * @return string
     */
    private function encodeToUTF8($string)
    {
        return Encoding::toUTF8($string);
    }
}