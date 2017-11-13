<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 13-Nov-17
 * Time: 13:35
 */

namespace app\controllers;


use app\helpers\PAYMENT_HELPER;
use yii\web\Controller;

class CheckoutController extends Controller
{

    public function Card($id)
    {

        $paymentModel = $this->loadModel($id);
        $_custF = new CustomFunctions();
        $fees = $_custF->returnAmountData($paymentModel->APPLICATION_FEE_ID);
        //$progs = $_custF->returnProgrammeData($paymentModel->DEGREE_CODE);
        $amountDue = ($fees->AMOUNT * 100); //multiply by 100 to remove decimal points 1.e 100.00->10000
        //build return URL
        $publicIP = Yii::app()->params->siteUrl;
        $returnURL = $publicIP . 'index.php/AppliedCourses/confirmation';

        //check currency type and change teh merchant url accordingly
        $vpcVersion = Yii::app()->params->vpcVersion;
        $gatewayURL = Yii::app()->params->gatewayURL;
        if ($fees->CURRENCY == 'KES') {
            $merchantID = Yii::app()->params->merchantidKES;
            $merchantCode = Yii::app()->params->merchantcodeKES;
            $secureToken = Yii::app()->params->tokenKES;
        } elseif ($fees->CURRENCY = 'USD') {
            $merchantID = Yii::app()->params->merchantidUSD;
            $merchantCode = Yii::app()->params->merchantcodeUSD;
            $secureToken = Yii::app()->params->tokenUSD;
        }

        $uniqueRefID = strtoupper(uniqid($paymentModel->APPLICATION_REF_NO . '-'));
        $uniqueOrderID = strtoupper(uniqid($paymentModel->APPLICATION_REF_NO . '-'));// . $paymentModel->APPLICATION_REF_NO;
        $paymentDataArr = array(
            "vpc_Amount" => $amountDue,//Final price should be multied by 100
            "vpc_AccessCode" => $merchantCode,//Put your access code here
            "vpc_Command" => "pay",
            "vpc_Currency" => $fees->CURRENCY, //@FIX Ask vendor to provide USD currency codes
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

        //2016/11/16 This was changed to use SHA algorithm
        //$secureHashFinal = md5($secureHash);//Encoding
        $hashinput = rtrim($url, "&");
        $secureHashFinal = hash_hmac('SHA256', $hashinput, pack('H*', $secureToken));
        $url .= "vpc_SecureHash=" . $secureHashFinal;
        $url .= "&vpc_SecureHashType=SHA256";

        //header("location:https://migs-mtf.mastercard.com.au/vpcpay?$url");
        //redirect to gateway
        $paymentURL = $gatewayURL . '?' . $url;
        //$paymentURL = $gatewayURL . $secureHashUrl;

        //echo $paymetUrl;
        //var_dump($paymentDataArr);

        //$this->render('cardmerchant',array('merchanturl'=>$paymentURL));
        //$this->redirect($paymentURL);

        //print_r(explode('&', $paymentURL));
        ApplicationLogger::LogTransaction($paymentModel->APPLICATION_REF_NO, $paymentDataArr, 'INFO', 'CARD');
        return $paymentURL;
    }

    public function actionConfirmation($vpc_TxnResponseCode)
    {

        $model = new GATEWAYTRANSACTIONS;
        $applicationModel = new APPAPPLICATION;
        $gateF = new GatewayFunctions();
        $custF = new CustomFunctions();
        $messaging = new ApplicationMessaging();

        $responseType = PAYMENT_HELPER::GetResponseDescription($vpc_TxnResponseCode);

        if (isset($_GET['resp'])) {
            $resp = $_GET['resp'];
        } else {
            $resp = $_GET;
        }
        $studentRefRaw = $resp['vpc_MerchTxnRef'];

        $keywords = preg_split("/[-]+/", $studentRefRaw);
        $studentRef = $keywords[0];

        $transactionRef = $studentRefRaw;
        $receiptNo = isset($resp['vpc_ReceiptNo']) ? $resp['vpc_ReceiptNo'] : null;
        $currency = $resp['vpc_Currency'];
        $respCode = $resp["vpc_TxnResponseCode"];
        $merchantReceipt = isset($resp['vpc_ReceiptNo']) ? $resp['vpc_ReceiptNo'] : null;
        $cardType = isset($resp['vpc_Card']) ? $resp['vpc_Card'] : null;

        $orderInfo = $resp["vpc_OrderInfo"];

        if ($currency == 'USD') {
            $amount = (int)$resp['vpc_Amount'] / 100;
        } else {
            $amount = (int)$resp['vpc_Amount'] / 100;
        }
        $channel = 'CARD';

        //dump the response in the table first
        $model->TRANSACTION_DETAILS = serialize($resp);//lets serialize this to a string
        $model->TRN_REF = $transactionRef; //$resp['vpc_MerchTxnRef'];
        $model->DATE_ADDED = new CDbExpression('NOW()');//date('d-M-Y H:i:s');


        $updatePaymentModel = $applicationModel->findByAttributes(array(
            'APPLICATION_REF_NO' => $studentRef,
        ));

        if ($updatePaymentModel == null) {
            throw new CHttpException(500, 'Unable to find matching user');
        }
        $pk = $updatePaymentModel->APPLICATION_ID;
        //next update the payment INFO
        $updateArray = array(
            'PAYMENT_STATUS' => 1,
            'PROCESSING_DATE' => new CDbExpression('NOW()')
        );

        if ($respCode == '0') {
            if ($model->save()) {
                if ($updatePaymentModel->updateByPk($pk, $updateArray)) {
                    //send the message
                    $applicant_id = $updatePaymentModel->APPLICANT_ID;
                    $messaging->SendMessage($applicant_id, $studentRef, $amount);
                } else {
                    //get the model data for updating
                    $updateCards = $updatePaymentModel->findByAttributes(array(
                        'APPLICATION_REF_NO' => $studentRef,
                    ));
                    ApplicationLogger::LogTransaction($studentRef, $updatePaymentModel->getErrors(), 'ERROR', 'CARD');
                    Yii::app()->user->setFlash('notice', 'This payment has already been processed. You can now print your receipt');
                }
            } else {

                $updateGatewayModel = $model->findByAttributes(
                    array('TRN_REF' => $studentRefRaw)
                );
                $gatewayPk = $updateGatewayModel->primaryKey;
                $gatewayUpdate = array(
                    'DATE_ADDED' => new CDbExpression('NOW()')
                );

                //update date on gateway transaction
                $updateGatewayModel->updateByPk($gatewayPk, $gatewayUpdate);

                //update status in app applications
                if ($updatePaymentModel->updateByPk($pk, $updateArray)) {
                    //save to the transaction logs
                    ApplicationLogger::LogTransaction($studentRef, $updatePaymentModel->attributes, 'INFO', 'CARD');

                    $saved = $gateF->SaveTransaction($gatewayPk, $studentRef, $transactionRef, $currency, $channel, $pk, $amount, $receiptNo, $merchantReceipt, $cardType, $orderInfo);
                    //$saved = $gateF->SaveTransaction($gatewayPk, $studentRef, $transactionRef, $currency, $channel, $pk, $amount, $receiptNo);
                    Yii::app()->user->setFlash('success', "Card transaction has been completed successfully");
                    ApplicationLogger::LogTransaction($studentRef, $model->getAttributes(), 'INFO', 'CARD');
                } else {

                    $getError = $model->getErrors('TRN_REF');
                    ApplicationLogger::LogTransaction($studentRef, $model->getErrors(), 'ERROR', 'CARD');
                    Yii::app()->user->setFlash('notice', $getError[0]);
                }
            }
        } else {

            $message = $gateF->getResponseDescription($respCode);
            ApplicationLogger::LogTransaction($studentRef, $message, 'ERROR', 'CARD');
            Yii::app()->user->setFlash('notice', "Payment transaction not successful, reason : $message");
        }
        //render the view
        $this->render('response', array('response' => $responseType, 'resp' => $resp, 'application_id' => $updatePaymentModel->APPLICATION_ID));
    }


    private function loadModel($id)
    {
        return null;
    }
}