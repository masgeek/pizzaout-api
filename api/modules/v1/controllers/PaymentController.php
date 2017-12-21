<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;


use app\api\modules\v1\models\USER_MODEL;
use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
use app\model_extended\CART_MODEL;
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

    /**
     * @return \Exception|object
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    public function actionPay()
    {

    }

    public function actionPayOld()
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
        $address_id = Yii::$app->request->post('ADDRESS_ID', null);
        $amount = Yii::$app->request->post('AMOUNT', null);
        $currency = Yii::$app->request->post('CURRENCY', null);
        $payment_channel = Yii::$app->request->post('PAYMENT_CHANNEL', APP_UTILS::PAYMENT_METHOD_CARD);

        if ($nonce != null) {
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////
            //////--------------------------------------------------------------------------------------------------/////
            /////////////////////////////////////////////////////////////////////////////////////////////////////////////
            $payment = new PAYMENT_HELPER();
            $resp = $payment->CreateSale($nonce, $amount, $currency, $cart_timestamp, $address_id, USER_MODEL::findOne($user_id), $payment_channel);
            if ($resp->ORDER_CREATED === true) {
                //clear the cart and create the order
                CART_MODEL::Clearcart($cart_timestamp);
            }

            return $resp;
        }
        return new \Exception('Invalid parameters', 500);
    }

    /**
     * @param $user_id
     * @return array
     */
    public function actionToken($user_id)
    {
        $payment = new PAYMENT_HELPER();

        $nonce = null;//$payment->GenerateNonce($user_id);
        $token = $payment->GetToken();//$payment->CreateSale($nonce);

        return [
            'CLIENT_TOKEN' => $token,
            'PAYMENT_NONCE' => $nonce
        ];
    }
}