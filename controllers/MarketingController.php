<?php

namespace app\controllers;

use Html2Text\Html2Text;
use Yii;
use app\model_extended\MailList;
use yii\data\ActiveDataProvider;
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
            $body = $model->body;

            $model->sent = false;
            $customers = $model->EvaluateCategory();
            echo '<pre>';

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
            'query' => MailList::find()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
