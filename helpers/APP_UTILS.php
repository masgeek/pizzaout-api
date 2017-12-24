<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 3:30 PM
 */

namespace app\helpers;


use app\model_extended\CART_MODEL;
use yii\helpers\Url;

class APP_UTILS
{
    const PAYMENT_METHOD_MOBILE = 'MOBILE';
    const PAYMENT_METHOD_CARD = 'CARD';

    const KITCHEN_SCOPE = 'KITCHEN';
    const CHEF_SCOPE = 'CHEF';
    const RIDER_SCOPE = 'RIDER';
    const OFFICE_SCOPE = 'OFFICE';
    const ALL_SCOPE = 'ALL';


    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    const SCENARIO_DEFAULT = 'default';
    const SCENARIO_ALLOCATE_KITCHEN = 'allocate_kitchen';
    const SCENARIO_CONFIRM_ORDER = 'confirm_order';
    const SCENARIO_PREPARE_ORDER = 'prepare_order';
    const SCENARIO_ORDER_READY = 'order_ready';
    const SCENARIO_ASSIGN_CHEF = 'assign_chef';
    const SCENARIO_ASSIGN_RIDER = 'assign_rider';
    const SCENARIO_UPDATE_RIDER = 'update_rider';


    const USER_TYPE_ADMIN = 'ADMIN';
    const USER_TYPE_CUSTOMER = 'CUSTOMER';

    /**
     * @return int
     */
    public static function GetTimeStamp()
    {
        $date = new \DateTime();
        return $date->getTimestamp();
    }

    /**
     * @param bool $readable
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public static function GetCurrentDateTime($readable = false)
    {
        $time = \Yii::$app->formatter->asDatetime('now', 'yyyy-MM-dd HH:mm:ss'); // 2014-10-06

        return $readable ? \Yii::$app->formatter->asDatetime($time, 'full') : $time;

    }

    public static function GetCartTimesTamp($user_id)
    {
        $model = CART_MODEL::findOne(['USER_ID' => $user_id]);
        return $model != null ? $model->CART_TIMESTAMP : self::GetTimeStamp();
    }

    /**
     * @param $image_url
     * @param bool $cleanUrl
     * @return string
     */
    public static function BuildImageUrl($image_url, $cleanUrl = false)
    {
        $imageFolder = \Yii::getAlias('@foodimages');

        $baseUrl = Url::to([null], true);


        $cleanBaseURL = substr($baseUrl, 0, strpos($baseUrl, "api"));
        $cleanBaseURL = substr($baseUrl, 0, strpos($baseUrl, "customer"));

        $imagePath = "{$cleanBaseURL}{$imageFolder}/{$image_url}";
        return $imagePath;
    }
}