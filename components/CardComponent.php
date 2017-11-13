<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 13-Nov-17
 * Time: 13:57
 */

namespace app\components;


use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\base\InvalidParamException;

/*
 *     'merchantcodeKES' => 'CA1B7397',
    'merchantidKES' => '00000123',
    'tokenKES' => '1E7941830AC474594028E6FEFCFB41AC',

    //USD GATEWAY
    'merchantcodeUSD' => 'D17ED546',
    'merchantidUSD' => '00000129',
    'tokenUSD' => '44F5091883BFDF85F158EA0A37D56902',
    'gatewayURL' => 'https://migs-mtf.mastercard.com.au/vpcpay?',
    'vpcVersion' => '1',
 */

class CardComponent extends Component
{
    public $content;
    public $instName;
    public $returnURL;
    public $baseURL;

    public $merchantcodeKES;
    public $merchantidKES;
    public $tokenKES;
    public $merchantcodeUSD;
    public $merchantidUSD;
    public $tokenUSD;

    public $gatewayURL;
    public $vpcVersion;


    public function init()
    {
        parent::init();

        $this->content;
        if ($this->vpcVersion == null) {
            $this->vpcVersion = 1;
        }

        if ($this->returnURL == null) {
            throw new InvalidParamException('Return URL cannot be null');
        }
    }
}