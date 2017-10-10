<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;


use yii\rest\ActiveController;

use Braintree_Configuration;

class PaymentController extends ActiveController
{
    protected $merchant_id = 't6ygyzrt59f2m7mr';
    protected $public_key = '5zzxx3744wv6qxp9';
    protected $private_key = 'ae0a779df3f2396ff219fa69e27a38e2';
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\PAYMENT_MODEL';

    public function actionToken($user_id = false)
    {

        Braintree_Configuration::environment('sandbox');
        Braintree_Configuration::merchantId($this->merchant_id);
        Braintree_Configuration::publicKey($this->public_key);
        Braintree_Configuration::privateKey($this->private_key);

        $params = [
            // 'customerId' => $user_id
        ];
        $clientToken = \Braintree_ClientToken::generate($params);

        return $clientToken;
    }
}