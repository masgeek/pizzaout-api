<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 1/6/2018
 * Time: 9:45 AM
 */

namespace app\api\modules\v1\models;


use app\helpers\APP_UTILS;
use app\models\ApiToken;

/**
 * Class API_TOKEN_MODEL
 * @package app\api\modules\v1\models
 */
class API_TOKEN_MODEL extends ApiToken
{

    /**
     * @param $user_id
     * @return null|string
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public static function CreateApiToken($user_id)
    {
        //let us check if it exists
        $token = self::findOne(['USER_ID' => $user_id]);
        if ($token == null) {
            //create new record  if it does not  exists
            $token = new self();
            $token->USER_ID = $user_id;
        }
        $token->API_TOKEN = APP_UTILS::GenerateToken();
        $token->DATE_CREATED = APP_UTILS::GetCurrentDateTime();
        $token->EXPIRY_DATE = APP_UTILS::GetFutureDateTime();

        if ($token->save()) {
            return $token->API_TOKEN;
        }
        return null;
    }

    /**
     * @param $api_token
     * @param $user_id
     * @return bool
     */
    public static function IsValidToken($api_token, $user_id)
    {
        $token = self::findOne(['API_TOKEN' => $api_token, 'USER_ID' => $user_id]);
        return $token != null ? true : false;
    }
}