<?php
return [
    'class' => 'app\components\CardComponent',
    'instName' => 'University of Nairobi',
    //base url for the links generated in the email
    'returnURL' =>'http://pizza.tsobu.co.ke/',
    'baseURL' => 'https://migs-mtf.mastercard.com.au',
    //Payment gateways information
    //'merchantcodeKES' => 'CA1B7397',
    //'merchantidKES' => '00000123',
    //'tokenKES' => '1E7941830AC474594028E6FEFCFB41AC',

    //USD GATEWAY
    'merchantcodeUSD' => 'D17ED546',
    'merchantidUSD' => '00000129',
    'tokenUSD' => '44F5091883BFDF85F158EA0A37D56902',
    'gatewayURL' => 'https://migs-mtf.mastercard.com.au/vpcpay?',
    'vpcVersion' => '1',
];

/**
 * University of Nairobi
 * Merchant ID: 00000129
 * Operator Id: admin
 * Password :  andalite6
 *
 * URL https://migs-mtf.mastercard.com.au/ma
 */