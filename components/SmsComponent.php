<?php
/**
 * Created by PhpStorm.
 * User: SAURON
 * Date: 4/4/2018
 * Time: 11:08 PM
 */

namespace app\components;


use yii\base\Component;
use yii\httpclient\Client;

class SmsComponent extends Component
{
    public $from;

    public $apiKey;
    public $apiToken;
    public $baseUrl;

    public $endpoint;

    private $apiUrl;

    public function init()
    {
        parent::init();
        $this->apiUrl = $this->baseUrl . $this->endpoint;
    }


    public function SendSms(array $userParams)
    {
        $test = "http://yooltech.com/sadar/portal/smsAPI?sendsms&apikey=Your_API_KEY&apitoken=YOUR_API_TOKEN&type=sms&from=SENDERID&to=123456&text=My+first+text";
        $paramsStatic = [
            //'sendsms',
            'apikey' => $this->apiKey,
            'apitoken' => $this->apiToken,
            'type' => 'sms',
            'from' => $this->from,
        ];

        echo '<pre>';

        $params = array_merge($userParams, $paramsStatic);


        var_dump($params);
        die;
        $queryString = $this->build_http_query($params);

        $ursl = $this->apiUrl . '?sendsms&' . $queryString;
        //die($ursl);
        $client = new Client(['baseUrl' => $this->baseUrl]);
        $response = $client->createRequest()
            //->setFormat(Client::FORMAT_JSON)
            ->setUrl($this->endpoint . '?sendsms')
            ->setData($params)
            ->send();

        var_dump($response);
    }

    /**
     * Builds an http query string.
     * @param array $query // of key value pairs to be used in the query
     * @return string       // http query string.
     **/
    function build_http_query($query)
    {

        $query_array = [];

        foreach ($query as $key => $key_value) {

            if (is_numeric($key)) {
                $query_array[] = urlencode($key_value);
            } else {
                $query_array[] = urlencode($key) . '=' . urlencode($key_value);
            }

        }

        return implode('&', $query_array);

    }
}