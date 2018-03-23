<?php

namespace app\controllers;

use Yii;
use app\model_extended\MailList;
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

class MarketingController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new MailList();

        if ($model->load(Yii::$app->request->post())) {
            //let us save in sequence
            $category = $model->category;
            $subject = $model->subject;
            $body = Html::encode($model->body);

            $model->sent = false;
            $customers = $model->EvaluateCategory();
            echo '<pre>';

            //isert to table

            foreach ($customers as $key => $customer) {

                $names = strtolower(ucfirst($customer->SURNAME));
                if ($model->email) {
                    $recipient = "{$names}<{$customer->EMAIL}>";
                    $model->isNewRecord = true;
                    $model->mail_id = null;
                    $model->receipent = $recipient;
                    //$model->body = $body;
                    $model->type = 'EMAIL';
                    $model->save();
                }
                if ($model->sms) {
                    $model->isNewRecord = true;
                    $model->mail_id = null;
                    $model->receipent = $customer->MOBILE;
                    //$model->body = strip_tags($body);
                    $model->type = 'SMS';
                    $model->save();
                }
            }

            //evaluate if we are to send sms or email or both
            return $category;
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

}
