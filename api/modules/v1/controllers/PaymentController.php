<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;


use Yii;
use app\helpers\PAYMENT_HELPER;
use app\helpers\PAYPAL_HELPER;
use yii\rest\ActiveController;


class PaymentController extends ActiveController
{
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\PAYMENT_MODEL';

    public function actionPay()
    {
        /*{
            "CART_TIMESTAMP":"2342423",
            "AMOUNT":"89",
            "USER_ID":"10",
            "NONCE":"5d9e76ec-562e-0fa3-5a7e-20d3d4935b2e"
        }*/

        $request = \Yii::$app->request->post();

        $nonce = Yii::$app->request->post('NONCE', null);
        $cart_timestamp = Yii::$app->request->post('CART_TIMESTAMP', null);
        $user_id = Yii::$app->request->post('USER_ID', null);
        $amount = Yii::$app->request->post('AMOUNT', null);

        if ($nonce != null) {
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////--------------------------------------------------------------------------------------------------/////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $payment = new PAYMENT_HELPER();
            return $payment->CreateSale($nonce, $amount);
        }
        return $request;
    }

    public function actionToken($user_id)
    {
        $payment = new PAYMENT_HELPER(true);

        $nonce = $payment->GenerateNonce($user_id);
        $token = $payment->GetToken();//$payment->CreateSale($nonce);

        return [
            'CLIENT_TOKEN' => $token,
            'PAYMENT_NONCE' => $nonce
        ];
    }
}