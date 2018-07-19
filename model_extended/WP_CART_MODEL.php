<?php
/**
 * Created by PhpStorm.
 * User: SAURON
 * Date: 7/7/2018
 * Time: 10:42 PM
 */

namespace app\model_extended;

use Yii;
use app\models\WpCart;

/**
 *
 * @property string|mixed $cartCookie
 */
class WP_CART_MODEL extends WpCart
{


    public function rules()
    {
        $rules = parent::rules();

        $rules[] = [['QUANTITY'], 'number', 'min' => 1];
        return $rules;
    }

    /**
     * @return mixed|string
     * @throws \yii\base\Exception
     */
    public static function getCartCookie()
    {
        $cookieKey = 'CART_GUID';
        $cookies = Yii::$app->request->cookies;

        $username = $cookies->getValue($cookieKey, null);
        if ($username != null) {
            if ($cookies->has($cookieKey)) {
                return $cookies->getValue($cookieKey);
            }
        }
        return self::setCartCookie();
    }

    /**
     * @return int|string
     * @throws \yii\base\Exception
     */
    public static function getCartItemsCount()
    {
        //$guid = self::getCartCookie();
        $items = self::find()
            //->where(['CART_GUID' => $guid])
            ->count('CART_GUID');

        return (int)$items;
    }

    /**
     * @return string
     * @throws \yii\base\Exception
     */
    private static function setCartCookie()
    {
        $cookieKey = 'CART_GUID';
        $guid = $randomString = Yii::$app->getSecurity()->generateRandomString();
        //we wil set cookie using the machine ip address and network mac
        $cookies = Yii::$app->response->cookies;

        $cookies->add(new \yii\web\Cookie([
            'name' => $cookieKey,
            'value' => $guid,
            'expire' => time() + (60 * 60 * 24) // 24 hours
        ]));

        return $cookies->getValue($cookieKey);
    }

    public static function ClearCart($cart_guid)
    {
        //remove the cart item
        self::deleteAll(['CART_GUID' => $cart_guid]);
    }
}