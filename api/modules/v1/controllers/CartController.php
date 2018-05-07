<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\API_TOKEN_MODEL;
use app\api\modules\v1\models\CART_MODEL;
use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
use Yii;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;


class CartController extends ActiveController
{
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\CART_MODEL';

    private $_apiToken = 0;
    private $_userID = 0;

    /**
     * @param string $action
     * @param null $model
     * @param array $params
     * @throws \yii\web\ForbiddenHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        /*$api_token = Yii::$app->request->headers->get("api_token", null);
        $user_id = Yii::$app->request->headers->get("user_id", null);

        if ($api_token == null && $user_id == null) {
            throw new \yii\web\ForbiddenHttpException("You can't $action this section. $api_token");
        }
        //check if the token is valid
        if (!API_TOKEN_MODEL::IsValidToken($api_token, $user_id)) {
            throw new \yii\web\ForbiddenHttpException('Invalid token, access denied');
        }*/
    }


    public function actionUpdateCart($id)
    {
        $post = Yii::$app->request->post();

        $cart = CART_MODEL::findOne($id);

        if ($cart->load(['CART_MODEL' => $post]) && $cart->save()) {
            return $cart;
        }

        $cart->validate();

        return $cart->getErrors();
    }


    public function actionItems($user_id)
    {
        $this->checkAccess('items');
        $cartItems = CART_MODEL::find()
            ->where(['USER_ID' => $user_id])
            ->all();

        return $cartItems;
    }

    /**
     * @param $item_type_id
     * @param $user_id
     * @return CART_MODEL|array|null|\yii\db\ActiveRecord
     * @throws ForbiddenHttpException
     */
    public function actionInCart($item_type_id, $user_id)
    {
        $this->checkAccess('in-cart');
        $size = \Yii::$app->request->post('ITEM_TYPE_SIZE', null); //'MEDIUM';
        $inCart = CART_MODEL::find()
            ->where(['ITEM_TYPE_ID' => $item_type_id])
            ->andWhere(['USER_ID' => $user_id])
            ->andWhere(['ITEM_TYPE_SIZE' => $size])
            ->one();

        return $inCart;
    }

    /**
     * @return array
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     */
    public function actionCreateOrder()
    {
        $this->checkAccess('create-order');
        //$cart_timestamp = Yii::$app->request->post('CART_TIMESTAMP', 0);
        $user_id = Yii::$app->request->post('USER_ID', 0);
        $location_id = Yii::$app->request->post('LOCATION_ID', 0);
        $order_time = Yii::$app->request->post('ORDER_TIME', 0);
        $payment_channel = Yii::$app->request->post('PAYMENT_CHANNEL', APP_UTILS::PAYMENT_METHOD_MOBILE);


        $date = APP_UTILS::GetCurrentDateTime();
        $order_payment_arr = [
            'CUSTOMER_ORDERS' => [
                'USER_ID' => $user_id,
                'LOCATION_ID' => $location_id,
                'PAYMENT_METHOD' => $payment_channel,
                'ORDER_DATE' => $date,
                'ORDER_TIME' => $order_time
            ]
        ];

        return ORDER_HELPER::CreateOrderFromCart($user_id, $order_payment_arr);

    }

    public function actionUssd()
    {
        $this->checkAccess('ussd');
        return ['USSD_NUMBER' => ORDER_HELPER::getUssdNumber()];
    }

}