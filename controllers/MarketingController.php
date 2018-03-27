<?php

namespace app\controllers;


use Html2Text\Html2Text;
use Yii;
use app\components\MailchimpComponent;
use app\model_extended\MailList;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;

class MarketingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /* @var $mc MailchimpComponent */
        $model = new MailList();

        if ($model->load(Yii::$app->request->post())) {
            //let us save in sequence
            $category = $model->category;
            $subject = $model->subject;
            $body = $model->body;

            $mailChimp = new MailchimpComponent();

            $model->sent = false;
            $customers = $model->EvaluateCategory();
            //isert to table

            if ($model->email) {
                //if with order and nor orders purge the mailing list first
                if (($category == MailList::CUST_NO_ORDERS)) {
                    //purge the list first
                    $deactivationList = $model->GetWithOrders();
                    $mailChimp->DeactivateMembers($category, $deactivationList);
                } elseif ($category == MailList::CUST_NO_ORDERS) {
                    //purge the list first
                    $deactivationList = $model->GetWithNoOrders();
                    $mailChimp->DeactivateMembers($category, $deactivationList);
                } elseif ($category == MailList::CUST_ALL) {

                }
                //$res = $mailChimp->AddSubscribers($category, $customers);

                $res = $mailChimp->ComposeCampaignMessage($category, $subject, $body, 'Message text', 'campaign' . date('YmdHis'));
            }
            foreach ($customers as $key => $customer) {
                if ($model->sms) {
                    $model->isNewRecord = true;
                    $model->mail_id = null;
                    $plainText = new Html2Text($body);

                    $model->receipent = $customer->MOBILE;
                    $model->body = $plainText->getText();
                    $model->type = 'SMS';
                    //$model->save();
                }
            }
            //evaluate if we are to send sms or email or both
            return $this->redirect(['marketing/queue']);
        }

        return $this->render('create-message', [
            'model' => $model,
        ]);
    }

    public function actionIndexOld()
    {
        $model = new MailList();

        if ($model->load(Yii::$app->request->post())) {
            //let us save in sequence
            $category = $model->category;
            $subject = $model->subject;
            $body = $model->body;

            $model->sent = false;
            $customers = $model->EvaluateCategory();
            //isert to table

            foreach ($customers as $key => $customer) {

                $names = strtolower(ucfirst($customer->SURNAME));
                if ($model->email) {
                    //$recipient = "{$names}<{$customer->EMAIL}>";
                    $model->isNewRecord = true;
                    $model->mail_id = null;
                    $model->receipent = $customer->EMAIL;
                    //$model->body = $body;
                    $model->type = 'EMAIL';
                    $model->save();
                }
                if ($model->sms) {
                    $model->isNewRecord = true;
                    $model->mail_id = null;
                    $plainText = new Html2Text($body);

                    $model->receipent = $customer->MOBILE;
                    $model->body = $plainText->getText();
                    $model->type = 'SMS';
                    $model->save();
                }
            }

            //evaluate if we are to send sms or email or both
            return $this->redirect(['marketing/queue']);
        }

        return $this->render('create-message', [
            'model' => $model,
        ]);
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
