<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 13-Nov-17
 * Time: 13:35
 */

namespace app\controllers;


use app\components\CardComponent;
use Yii;
use app\helpers\PAYMENT_HELPER;
use yii\web\Controller;

class CheckoutController extends Controller
{


    public function actionCard($id)
    {

        /* @var $card CardComponent */
        //define the card component
        $card = Yii::$app->card;


        var_dump($card);
        die;
        $paymentModel = $this->loadModel($id);

        $amount = 2000;

        $amountDue = ($amount * 100); //multiply by 100 to remove decimal points 1.e 100.00->10000
        //build return URL
        $publicIP = Yii::$app->params['returnURL'];
        $returnURL = $publicIP . 'checkout/confirmation';

        //check currency type and change the merchant url accordingly
        $vpcVersion = Yii::$app->params['vpcVersion'];
        $gatewayURL = Yii::$app->params['gatewayURL'];

        $merchantID = Yii::$app->params['merchantidUSD'];
        $merchantCode = Yii::$app->params['merchantcodeUSD'];
        $secureToken = Yii::$app->params['tokenUSD'];


        $uniqueRefID = strtoupper(uniqid('-'));
        $uniqueOrderID = strtoupper(uniqid('-'));

        $currency = 'USD';

        $paymentDataArr = array(
            "vpc_Amount" => $amountDue,//Final price should be multied by 100
            "vpc_AccessCode" => $merchantCode,//Put your access code here
            "vpc_Command" => "pay",
            "vpc_Currency" => $currency, //@FIX Ask vendor to provide USD currency codes
            //"vpc_Message" => "Application fee payment for $paymentModel->APPLICATION_REF_NO",
            "vpc_Locale" => "en_UK",
            "vpc_MerchTxnRef" => $uniqueRefID, //This should be something unique number, i have used the session id for this
            "vpc_Merchant" => $merchantID,//Add your merchant number here
            "vpc_OrderInfo" => $uniqueOrderID,//this also better to be a unique number
            "vpc_ReturnURL" => $returnURL,//Add the return url here so you have to code here to capture whether the payment done successfully or not
            "vpc_Version" => $vpcVersion,
            //"vpc_SecureHashType"=>"SHA256"
        );

        ksort($paymentDataArr); // You have to ksort the array to make it according to the order that it needs

        $url = "";
        foreach ($paymentDataArr as $key => $value) {
            //urlencode causes sha mismatch, removed it
            //$url .= $key . "=" . urlencode($value) . "&";
            $url .= $key . "=" . $value . "&";
        }

        $hashing_url = rtrim($url, "&");
        $secureHashFinal = hash_hmac('SHA256', $hashing_url, pack('H*', $secureToken));
        $url .= "vpc_SecureHash=" . $secureHashFinal;
        $url .= "&vpc_SecureHashType=SHA256";

        //header("location:https://migs-mtf.mastercard.com.au/vpcpay?$url");
        //redirect to gateway
        $paymentURL = $gatewayURL . '?' . $url;


        return $paymentURL;
    }

    public function actionConfirmation($vpc_TxnResponseCode)
    {
        //RESPONSE FROM THE MERCGANET

        var_dump($_REQUEST);

        //$responseType = PAYMENT_HELPER::GetResponseDescription($vpc_TxnResponseCode);

        return 1;

    }


    private function loadModel($id)
    {
        return null;
    }
}