<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 3:30 PM
 */

namespace app\helpers;


use app\model_extended\CART_MODEL;
use Yii;
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
     * @param string $format
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public static function GetCurrentDateTime($format = 'yyyy-MM-dd HH:mm:ss')
    {

        return \Yii::$app->formatter->asDatetime('now', $format);

    }

    public static function GetCartTimesTamp($user_id)
    {
        $model = CART_MODEL::findOne(['USER_ID' => $user_id]);
        return $model != null ? $model->CART_TIMESTAMP : self::GetTimeStamp();
    }

    /**
     * @param $image_url
     * @param bool $fromApi
     * @param string $alias
     * @param string $imageFolder
     * @return string
     */
    public static function BuildImageUrl($image_url, $fromApi = true, $alias = '@foodimages', $imageFolder = "images")
    {

        $imageFolder = \Yii::getAlias($alias);
        return Yii::$app->homeUrl . '/' . $imageFolder;
        if ($alias != null) {
            $imageFolder = \Yii::getAlias($alias);
            $baseUrl = Url::to([null], true);


            if ($fromApi) {
                $cleanBaseURL = substr($baseUrl, 0, strpos($baseUrl, "api"));
            } else {
                $cleanBaseURL = substr($baseUrl, 0, strpos($baseUrl, "customer"));
            }
            $parsed = parse_url($cleanBaseURL);
            if (empty($parsed['scheme'])) {
                //$urlStr = 'http://' . ltrim($urlStr, '/');
                $cleanBaseURL = substr($baseUrl, 0, strpos($baseUrl, "site"));
            }
        } else {
            $cleanBaseURL = Url::base(true);
            $cleanBaseURL .= '/';
        }
        return "{$cleanBaseURL}{$imageFolder}/{$image_url}";
    }
}