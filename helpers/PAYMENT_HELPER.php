<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 10-Oct-17
 * Time: 13:12
 */

namespace app\helpers;

use Braintree_Configuration;
use Pafelin\LaravelNonce\Nonce;

class PAYMENT_HELPER
{
    protected $merchant_id = 't6ygyzrt59f2m7mr';
    protected $public_key = 'tgp4fy8pdcvtq2g6';
    protected $private_key = '1c7d269df330dd2ab3077d6c7d0e7941';

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
        $t = new Nonce();
        $nonce = $t->generate($user_id);

        return $nonce;
    }

    public function CreateSale($nonceFromTheClient)
    {
        $result = \Braintree_Transaction::sale([
            'amount' => '100.00',
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return $result;
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
    public static function CartType($card_code)
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
}