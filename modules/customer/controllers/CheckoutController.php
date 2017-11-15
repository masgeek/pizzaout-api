<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 13-Nov-17
 * Time: 13:35
 */

namespace app\modules\customer\controllers;


use app\api\modules\v1\models\PAYMENT_MODEL;
use app\components\CardComponent;
use app\helpers\APP_UTILS;
use app\helpers\ORDER_STATUS_HELPER;
use app\model_extended\CART_MODEL;
use app\model_extended\CUSTOMER_ORDERS;
use kartik\growl\Growl;
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
        $session = Yii::$app->session;

        $cart_timestamp = $session->get('CART_TIMESTAMP');

        $amount = $this->GetCartTotal($cart_timestamp);

        $amountDue = ($amount * 100); //multiply by 100 to remove decimal points 1.e 100.00->10000
        //build return URL
        $urlPayload = "";
        $returnURL = $card->ConfirmationUrl(); // $publicIP . 'checkout/confirmation';

        //check currency type and change the merchant url accordingly
        $vpcVersion = $card->vpcVersion;
        $gatewayURL = $card->gatewayURL;

        $merchantID = $card->merchantidUSD;
        $merchantCode = $card->merchantcodeUSD;
        $secureToken = $card->tokenUSD;


        $uniqueRefID = strtoupper(uniqid("{$id}-"));
        $uniqueOrderID = strtoupper(uniqid("{$id}-"));

        $currency = 'USD';

        $paymentDataArr = array(
            "vpc_Amount" => $amountDue,//Final price should be multied by 100
            "vpc_AccessCode" => $merchantCode,//Put your access code here
            "vpc_Command" => "pay",
            "vpc_Currency" => $currency, // @FIX Ask vendor to provide USD currency codes
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


        foreach ($paymentDataArr as $key => $value) {
            //urlencode causes sha mismatch, removed it
            //$url .= $key . "=" . urlencode($value) . "&";
            $urlPayload .= $key . "=" . $value . "&";
        }

        $hashing_url = rtrim($urlPayload, "&");
        $secureHashFinal = hash_hmac('SHA256', $hashing_url, pack('H*', $secureToken));
        $urlPayload .= "vpc_SecureHash=" . $secureHashFinal;
        $urlPayload .= "&vpc_SecureHashType=SHA256";

        //header("location:https://migs-mtf.mastercard.com.au/vpcpay?$url");
        //redirect to gateway
        $paymentURL = "{$gatewayURL}{$urlPayload}";

        return $this->redirect($paymentURL); //$paymentURL;
    }

    /**
     *
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function actionConfirmation()
    {
        //RESPONSE FROM THE MERCGANET
        /*
         * 'vpc_3DSECI' => string '05' (length=2)
          'vpc_3DSXID' => string 'lG/WwUBF/9bg33i7Haj/9Pb5XIo=' (length=28)
          'vpc_3DSenrolled' => string 'Y' (length=1)
          'vpc_3DSstatus' => string 'Y' (length=1)
          'vpc_AVSResultCode' => string 'Unsupported' (length=11)
          'vpc_AcqAVSRespCode' => string 'Unsupported' (length=11)
          'vpc_AcqCSCRespCode' => string 'M' (length=1)
          'vpc_AcqResponseCode' => string '00' (length=2)
          'vpc_Amount' => string '200000' (length=6)
          'vpc_AuthorizeId' => string '055801' (length=6)
          'vpc_BatchNo' => string '20171113' (length=8)
          'vpc_CSCResultCode' => string 'M' (length=1)
          'vpc_Card' => string 'VC' (length=2)
          'vpc_Command' => string 'pay' (length=3)
          'vpc_Currency' => string 'USD' (length=3)
          'vpc_Locale' => string 'en_UK' (length=5)
          'vpc_MerchTxnRef' => string '-5A097DE70C03F' (length=14)
          'vpc_Merchant' => string '00000129' (length=8)
          'vpc_Message' => string 'Approved' (length=8)
          'vpc_OrderInfo' => string '-5A097DE70C044' (length=14)
          'vpc_ReceiptNo' => string '731722364810' (length=12)
          'vpc_SecureHash' => string '5C08FABAC8912B6E90AD0A6A7C3AAA598F05F7D09001534EF4A0846B517E1DF9' (length=64)
          'vpc_SecureHashType' => string 'SHA256' (length=6)
          'vpc_TransactionNo' => string '1100000008' (length=10)
          'vpc_TxnResponseCode' => string '0' (length=1)
          'vpc_VerSecurityLevel' => string '05' (length=2)
          'vpc_VerStatus' => string 'Y' (length=1)
          'vpc_VerToken' => string 'gIGCg4SFhoeIiYqLjI2Oj5CRkpM=' (length=28)
          'vpc_VerType' => string '3DS' (length=3)
          'vpc_Version' => string '1' (length=1)
         */

        $session = Yii::$app->session;

        $cart_timestamp = $session->get('CART_TIMESTAMP');


        $resp_code = (int)Yii::$app->request->get('vpc_TxnResponseCode', 100);
        $batchNo = Yii::$app->request->get('vpc_BatchNo'); //=> string '20171113' (length=8)
        $cardType = PAYMENT_HELPER::CartType(Yii::$app->request->get('vpc_Card')); //=> string 'M' (length=1)
        $paymentCurrency = Yii::$app->request->get('vpc_Currency'); //=> string 'USD' (length=3)
        $merchantTxnRef = Yii::$app->request->get('vpc_MerchTxnRef'); //=> string '-5A097DE70C03F' (length=14)
        $orderInfo = Yii::$app->request->get('vpc_OrderInfo');// => string '-5A097DE70C044' (length=14)
        $receiptNo = Yii::$app->request->get('vpc_ReceiptNo');// => string '731722364810' (length=12)
        $transactionNo = Yii::$app->request->get('vpc_TransactionNo');// => string '1100000008' (length=10)

        $paymentAmountRaw = Yii::$app->request->get('vpc_Amount');
        $paymentAmount = (float)$paymentAmountRaw / 100;

        $responseType = PAYMENT_HELPER::GetResponseDescription($resp_code);

        $splitter = '/[\-\?]+/';
        $order_id_raw = preg_split($splitter, $merchantTxnRef);
        //$order_id = explode('_',$merchantTxnRef);
        $order_id = (int)$order_id_raw[0];

        $postData = [
            //'PAYMENT_ID',
            'PAYMENT_MODEL' => [
                'ORDER_ID' => $order_id,
                'PAYMENT_CHANNEL' => APP_UTILS::PAYMENT_METHOD_CARD,
                'PAYMENT_AMOUNT' => $paymentAmount,
                'PAYMENT_REF' => $merchantTxnRef,
                'PAYMENT_STATUS' => ORDER_STATUS_HELPER::STATUS_ORDER_CONFIRMED,
                'PAYMENT_DATE' => APP_UTILS::GetCurrentDateTime(),
                'PAYMENT_NOTES' => $receiptNo,
                'PAYMENT_NUMBER' => $cardType,
            ]
        ];

        $searchPayment = PAYMENT_MODEL::findOne(['ORDER_ID' => $order_id]);
        $model = $searchPayment != null ? $searchPayment : new PAYMENT_MODEL();
        $model->load($postData); //load the array data in to the model attributes


        if ($model->save() && $resp_code === 0) {
            //mark payment as confirmed also
            //CUSTOMER_ORDERS::updateAll(['ORDER_STATUS' => ORDER_STATUS_HELPER::STATUS_ORDER_CONFIRMED], "ORDER_ID='{$order_id}'");
            $orders = CUSTOMER_ORDERS::findOne($order_id);
            $orders->ORDER_STATUS = ORDER_STATUS_HELPER::STATUS_ORDER_CONFIRMED;
            $orders->save();

            //clear the cart items
            //CART_MODEL::ClearCart($cart_timestamp);
            //set flash and tell user that order is successful
            $session->setFlash('CARD', $responseType);
            $respPayload = [
                'growl_type' => Growl::TYPE_SUCCESS,
                'title' => 'Success',
                'message' => 'Order has been processed successfully'
            ];
        } else {
            //set the flash and tell user the order has failed
            $session->setFlash('CARD', $responseType);
            $respPayload = [
                'growl_type' => Growl::TYPE_DANGER,
                'title' => 'Transaction Failure',
                'message' => 'Order not processed successfully'
            ];
        }
        //log to the database
        $this->layout = 'customer_layout_no_cart';
        return $this->render('/checkout/success', $respPayload); //$responseType;

    }


    private function GetCartTotal($cart_timestamp)
    {
        $cartItems = CART_MODEL::find()
            ->where(['CART_TIMESTAMP' => $cart_timestamp])
            ->all();

        $amount = 0;
        foreach ($cartItems as $key => $cartModel) {
            $amount = $amount + ((int)$cartModel->QUANTITY * (float)$cartModel->ITEM_PRICE);
        }

        return $amount;
    }

    private function loadModel($id)
    {
        return null;
    }
}