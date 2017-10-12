<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;


use app\Helpers\PaymentHelper;
use app\Helpers\PaypalHelper;
use yii\rest\ActiveController;


class PaymentController extends ActiveController
{
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\PAYMENT_MODEL';

    public function actionPay($user_id)
    {
        //$payment = new PaymentHelper();
        //$nonce = 'fake-valid-nonce';///$payment->GenerateNonce($user_id);
        //$resp = $payment->CreateSale($nonce);

        $payment = new PaypalHelper();

        $resp = $payment->CreateCard();
        return $resp;
    }

    public function actionToken($user_id = false)
    {
        $user_id = 56;
        $payment = new PaymentHelper();

        $nonce = 'fake-valid-nonce';///$payment->GenerateNonce($user_id);
        $token = $payment->GetToken();//$payment->CreateSale($nonce);

        return [
            'CLIENT_TOKEN' => $token,
            'PAYMENT_NONCE' => $nonce
        ];
    }
}