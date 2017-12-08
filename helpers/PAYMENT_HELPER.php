<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 10-Oct-17
 * Time: 13:12
 */

namespace app\helpers;

use app\api\modules\v1\models\PAYMENT_MODEL;
use app\api\modules\v1\models\USER_MODEL;
use Yii;
use Braintree_Configuration;
use Pafelin\LaravelNonce\Nonce;

class PAYMENT_HELPER
{
    /*
     * Braintree_Configuration::environment('sandbox');
Braintree_Configuration::merchantId('t6ygyzrt59f2m7mr');
Braintree_Configuration::publicKey('vh8ctdxv4fqwgtpt');
Braintree_Configuration::privateKey('2bc24b7befcaca84f632ea9cc78806dd');
     */
    protected $merchantAccountId = 'tsobuenterprise'; //account to use for the payment
    protected $merchant_id = 't6ygyzrt59f2m7mr';
    protected $public_key = 'vh8ctdxv4fqwgtpt';
    protected $private_key = '2bc24b7befcaca84f632ea9cc78806dd';

    public $environment = 'sandbox';

    function __construct()
    {

        Braintree_Configuration::environment($this->environment);
        Braintree_Configuration::merchantId($this->merchant_id);
        Braintree_Configuration::publicKey($this->public_key);
        Braintree_Configuration::privateKey($this->private_key);
    }

    public function GetToken(array $params = [])
    {
        $clientToken = \Braintree_ClientToken::generate();

        //$clientToken  = \Braintree_MerchantAccount::find($this->merchant_id);
        return $clientToken;
    }

    public function GenerateNonce($user_id)
    {
        $hasher = uniqid("{$user_id}_USER");
        $generator = new Nonce();
        $nonce = $generator->generate($user_id);

        return $nonce;
    }

    /**
     * @param $nonceFromTheClient
     * @param $amount
     * @param $currency
     * @param $cartimestamp
     * @param $address_id
     * @param USER_MODEL $customer
     * @return object
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    public function CreateSale($nonceFromTheClient, $amount, $currency, $cartimestamp, $address_id, USER_MODEL $customer, $paymentChannel)
    {
        /* @var $customer USER_MODEL */
        //$braintree = Yii::$app->braintree;
        //return $braintree;


        if ($currency == 'KES') {
            $this->merchantAccountId = 'tsobu2';
        }
        $result = \Braintree_Transaction::sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonceFromTheClient,
            'orderId' => $cartimestamp,
            'merchantAccountId' => $this->merchantAccountId,
            'customer' => [
                'firstName' => $customer->SURNAME,
                'lastName' => $customer->OTHER_NAMES,
                //'company' => 'Braintree',
                'phone' => $customer->MOBILE,
                //'fax' => '312-555-1235',
                //'website' => 'http://www.example.com',
                'email' => $customer->EMAIL
            ],
            'options' => [
                'submitForSettlement' => true,
            ]
        ]);

        $order_payment_arr = [
            'CUSTOMER_ORDERS' => [
                'USER_ID' => $customer->USER_ID,
                'ADDRESS_ID' => $address_id,
                'PAYMENT_METHOD' => $paymentChannel,
                'ORDER_DATE' => APP_UTILS::GetCurrentDateTime()
            ],
            'CUSTOMER_PAYMENTS' => [
                'PAYMENT_AMOUNT' => $amount,
                'PAYMENT_CHANNEL' => $paymentChannel,
                'PAYMENT_NUMBER' => $paymentChannel,
                'PAYMENT_DATE' => APP_UTILS::GetCurrentDateTime(),
                'PAYMENT_NOTES' => $nonceFromTheClient,
                'PAYMENT_REF' => $cartimestamp,
            ]
        ];

        //Yii::trace($result, 'INFO');
        if ($result->success) {
            //save the payment details
            //create the order as well
            $resp = ORDER_HELPER::CreateOrderFromCart($customer->USER_ID, $order_payment_arr, [], true);
            $message = [
                'STATUS' => $result->success,
                'TRANS_STATUS' => $result->transaction->status,
                'TRANS_TYPE' => $result->transaction->type,
                'ORDER_CREATED' => $resp,
                'MESSAGE' => 'Payment Successful'
            ];
        } else {
            $message = [
                'STATUS' => $result->success,
                'TRANS_STATUS' => 'Failed',
                'TRANS_TYPE' => null,
                'ORDER_CREATED' => false,
                'MESSAGE' => $result->message
            ];
        }

        return (object)$message;
    }

    /**
     * @param $vpc_TxnResponseCode
     * @return string
     */
    public static function GetResponseDescription($vpc_TxnResponseCode)
    {

        switch ($vpc_TxnResponseCode) {
            case "0" :
                $result = "Transaction Successful";
                break;
            case "?" :
                $result = "Transaction status is unknown";
                break;
            case "1" :
                $result = "Unknown Error";
                break;
            case "2" :
                $result = "Bank Declined Transaction";
                break;
            case "3" :
                $result = "No Reply from Bank";
                break;
            case "4" :
                $result = "Expired Card";
                break;
            case "5" :
                $result = "Insufficient funds";
                break;
            case "6" :
                $result = "Error Communicating with Bank";
                break;
            case "7" :
                $result = "Payment Server System Error";
                break;
            case "8" :
                $result = "Transaction Type Not Supported";
                break;
            case "9" :
                $result = "Bank declined transaction (Do not contact Bank)";
                break;
            case "A" :
                $result = "Transaction Aborted";
                break;
            case "C" :
                $result = "Transaction Cancelled";
                break;
            case "D" :
                $result = "Deferred transaction has been received and is awaiting processing";
                break;
            case "F" :
                $result = "3D Secure Authentication failed";
                break;
            case "I" :
                $result = "Card Security Code verification failed";
                break;
            case "L" :
                $result = "Shopping Transaction Locked (Please try the transaction again later)";
                break;
            case "N" :
                $result = "Cardholder is not enrolled in Authentication scheme";
                break;
            case "P" :
                $result = "Transaction has been received by the Payment Adaptor and is being processed";
                break;
            case "R" :
                $result = "Transaction was not processed - Reached limit of retry attempts allowed";
                break;
            case "S" :
                $result = "Duplicate SessionID (OrderInfo)";
                break;
            case "T" :
                $result = "Address Verification Failed";
                break;
            case "U" :
                $result = "Card Security Code Failed";
                break;
            case "V" :
                $result = "Address Verification and Card Security Code Failed";
                break;
            default  :
                $result = "Unable to be determined";
        }
        return $result;
    }

    /**
     * return the card types
     * @param $card_code
     * @return string
     */
    public static function getCardType($card_code)
    {
        switch (strtoupper($card_code)) {
            case 'VI':
                $cardType = 'Visa';
                break;
            case 'AX':
                $cardType = 'American Express';
                break;
            case 'BC':
                $cardType = 'BC Card';
                break;
            case 'CA':
            case 'MC':
                $cardType = 'Mastercard';
                break;
            case 'DS':
                $cardType = 'Diners Club';
                break;
            case 'T':
                $cardType = 'Carta Si';
                break;
            case 'R':
                $cardType = 'Carte Bleue';
                break;
            case 'E':
                $cardType = 'Visa Electron';
                break;
            case 'JC':
                $cardType = 'Japan Credit Bureau';
                break;
            case 'TO':
                $cardType = 'Maestro';
                break;
            default:
                $cardType = 'Unknown';
                break;
        }

        return $cardType;
    }

    /**
     * @param array $payment_arr
     * @return PAYMENT_MODEL
     */
    public static function LogPayments(array $payment_arr)
    {
        $payment = new PAYMENT_MODEL();
        $payment->load($payment_arr);

        return $payment;
    }
}