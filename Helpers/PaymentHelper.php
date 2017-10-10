<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 10-Oct-17
 * Time: 13:12
 */

namespace app\Helpers;

use Braintree_Configuration;
use Pafelin\LaravelNonce\Nonce;

class PaymentHelper
{
    protected $merchant_id = 't6ygyzrt59f2m7mr';
    protected $public_key = '5zzxx3744wv6qxp9';
    protected $private_key = 'ae0a779df3f2396ff219fa69e27a38e2';

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
        $clientToken = \Braintree_ClientToken::generate($params);

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