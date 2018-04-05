<?php
/**
 * Created by PhpStorm.
 * User: SAURON
 * Date: 4/4/2018
 * Time: 11:08 PM
 */

namespace app\components;


use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\httpclient\Client;

class SmsComponent extends Component
{
    /**
     * @var string $from Alphanumeric sender id, has to be registered
     */
    public $from;

    /**
     * @var string $apiKey Key for the URL
     */
    public $apiKey;
    /**
     * @var string $apiToken Token for the URL
     */
    public $apiToken;
    public $baseUrl;
    public $defaultPrefix;

    public $endpoint;
    public $type;
    private $apiUrl;

    public function init()
    {
        parent::init();
        if ($this->baseUrl == null) {
            throw new InvalidConfigException('Please specify the baseUrl');
        }

        if ($this->endpoint == null) {
            $this->endpoint = '/smsAPI';
        }
        if ($this->type == null) {
            $this->type = 'sms';
        }

        $this->apiUrl = $this->baseUrl . $this->endpoint;
    }

    public function SendSms(array $userParams)
    {
        $paramsStatic = [
            //'sendsms',
            'apikey' => $this->apiKey,
            'apitoken' => $this->apiToken,
            'type' => $this->type,
            'from' => $this->from,
        ];


        $newPhone = $this->validatePhoneNumber($userParams['to']);


        $userParams['to'] = $newPhone;

        $params = array_merge($userParams, $paramsStatic);


        $queryString = $this->build_http_query($params);

        //$ursl = $this->apiUrl . '?sendsms&' . $queryString;
        $client = new Client(['baseUrl' => $this->baseUrl]);
        $response = $client->createRequest()
            //->setFormat(Client::FORMAT_JSON)
            ->setUrl($this->endpoint . '?sendsms')
            ->setData($params)
            ->send();
        if (!$response->isOk) {
            //throw new \Exception('Unable to add user.');\
            return false;
        }
        return true;//$response->data['id'];
    }

    /**
     * @param $phone_number_raw
     * @return mixed|string
     */
    private function validatePhoneNumber($phone_number_raw)
    {

        //+252 yxx xxxx, +252 yy xxx xxx or +252 yyy xxx xxx
        $phone_number_raw = trim($phone_number_raw);

        $phone_number_raw = str_replace('+', null, $phone_number_raw);


        if (preg_match('#^' . $this->defaultPrefix . '#', $phone_number_raw)) {
            return $phone_number_raw;
        }

        //evaluate the phone numbers by length o determine if country prefix is p[laced
        if (strlen($phone_number_raw) >= 12) {
            //means it has international code
            return $phone_number_raw;
        }

        //else replace teh zero and prefix default international code
        $phone_number = preg_replace('/^0/', null, $phone_number_raw);

        return "{$this->defaultPrefix}{$phone_number}";
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