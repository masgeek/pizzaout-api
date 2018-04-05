<?php

namespace app\controllers;


use app\components\SmsComponent;
use Html2Text\Html2Text;
use Yii;
use app\components\MailchimpComponent;
use app\model_extended\MailList;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;

class MarketingController extends \yii\web\Controller
{

    /**
     * @return string|\yii\web\Response
     * @throws \Exception
     */
    public function actionIndex()
    {
        /* @var $mc MailchimpComponent */
        $model = new MailList();
        /* @var $sms SmsComponent */
        $sms = Yii::$app->sms;

        $campaign_id = 0;
        if ($model->load(Yii::$app->request->post())) {
            //let us save in sequence
            $list_id = $model->category;
            $subject = $model->subject;
            $body = $model->body;
            $plainText = new Html2Text($body);
            $mailChimp = new MailchimpComponent();

            $model->sent = false;
            $customers = $model->EvaluateCategory();
            //isert to table

            if ($model->email) {
                $mailChimp->ComposeCampaignMessage($list_id, $subject, $body, $plainText->getText(), $campaign_id);
            }
            foreach ($customers as $key => $customer) {
                if ($model->sms) {
                    $params = [
                        'to' => $customer->MOBILE,
                        'text' => $model->sms_text,
                    ];

                    $sms->SendSms($params);
                }
            }
            //evaluate if we are to send sms or email or both
            //Yii::$app()->session->setFlash();
            $message = "Campaign id <strong>{$campaign_id}</strong> created and sent successfully. <strong>" . count($customers) . "</strong> customers messaged";
            Yii::$app->session->setFlash('success', $message);
            return $this->redirect(['marketing/queue']);
        }
        $model->email = true;
        return $this->render('create-message', [
            'model' => $model,
        ]);
    }

    /**
     * @param $list_id
     * @return string
     * @throws \Exception
     */
    public function actionUpdateList($list_id)
    {
        $mailChimp = new MailchimpComponent();
        $model = new MailList();
        $resp = [];
        $model->category = $list_id;
        $customers = $model->EvaluateCategory();
        $deactivationList = [];

        if (($list_id === MailList::CUST_PAST_ORDERS)) {
            //purge the list first
            $deactivationList = $model->GetWithNoOrders();
        } elseif ($list_id === MailList::CUST_NO_ORDERS) {
            //purge the list first
            $deactivationList = $model->GetWithOrders();
        }

        if (count($deactivationList) > 0) {
            $resp = $mailChimp->DeactivateMembers($list_id, $deactivationList);
        }

        return Json::encode($resp);
    }

    /**
     * @param $list_id
     * @return string
     * @throws \Exception
     */
    public function actionAddCustomers($list_id)
    {
        $mailChimp = new MailchimpComponent();
        $model = new MailList();

        $model->category = $list_id;
        $customers = $model->EvaluateCategory();

        $resp = $mailChimp->AddSubscribers($list_id, $customers);

        return Json::encode($resp);
    }

    /**
     * @param $batch_id
     * @return string
     * @throws \Exception
     */
    public function actionBatchStatus($batch_id)
    {
        $mailChimp = new MailchimpComponent();

        $resp = $mailChimp->CheckBatchStatus($batch_id);

        return Json::encode($resp);
    }

    /**
     * Lists all MailList models.
     * @return mixed
     */
    public function actionQueue()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => MailList::find()->where(['sent' => false])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
