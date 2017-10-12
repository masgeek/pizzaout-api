<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 12-Oct-17
 * Time: 14:01
 */

namespace app\Helpers;


class PaypalHelper
{

    protected $client_id = 'AdMdfaROiPXoAQcv0vEJr8f_pfe4qB6AINOxNZqQfPURdn-6qdzHWAV829r_idqHSjUD3QwrfcMTmSQI';
    protected $client_secret = 'ENlJ5v3X9k_M6BSyX_yV3gqZqrDIdD3SdCaELsLuwgAvsE4g0xCw4nrzD0wUOcXIVlATEeA6auCpguGT';

    protected $apiContext;

    function __construct()
    {
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $this->client_id,     // ClientID
                $this->client_secret      // ClientSecret
            )
        );

        $this->apiContext->setConfig(
            array(
                'log.LogEnabled' => true,
                'log.FileName' => 'PayPalPizza.log',
                'log.LogLevel' => 'DEBUG'
            )
        );
    }

    public function CreateCard()
    {
        $creditCard = new \PayPal\Api\CreditCard();
        $creditCard->setType("visa")
            ->setNumber("4417119669820331")
            ->setExpireMonth("11")
            ->setExpireYear("2019")
            ->setCvv2("012")
            ->setFirstName("Joe")
            ->setLastName("Shopper");

        try {
            $creditCard->create($this->apiContext);
            return  $creditCard;
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            return  $ex->getData();
        }
    }
}