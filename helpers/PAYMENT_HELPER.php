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

    public function GenerateNonce($user_id){
        $t = new Nonce();
        $nonce = $t->generate($user_id);

        return $nonce;
    }
    public function CreateSale($nonceFromTheClient){
        $result = \Braintree_Transaction::sale([
            'amount' => '100.00',
            'paymentMethodNonce' => $nonceFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return $result;
    }
}