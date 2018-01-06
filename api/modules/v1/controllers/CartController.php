<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;

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


    /**
     * Checks the privilege of the current user.
     *
     * This method should be overridden to check whether the current user has the privilege
     * to run the specified action against the specified data model.
     * If the user does not have access, a [[ForbiddenHttpException]] should be thrown.
     *
     * @param string $action the ID of the action to be executed
     * @param \yii\base\Model $model the model to be accessed. If `null`, it means no specific model is being accessed.
     * @param array $params additional parameters
     * @throws ForbiddenHttpException if the user does not have access
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

    public function actionCreateOld()
    {
        $post = Yii::$app->request->post();

        $cart = new CART_MODEL();

        $cart->load(['CART_MODEL' => $post]);

        $cart->validate();
        return $cart->getErrors();

        return $cart;
    }

    public function actionItems($user_id)
    {
        $cartItems = CART_MODEL::find()
            ->where(['USER_ID' => $user_id])
            ->all();

        return $cartItems;
    }

    public function actionInCart($item_type_id, $user_id)
    {
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
        //$cart_timestamp = Yii::$app->request->post('CART_TIMESTAMP', 0);
        $user_id = Yii::$app->request->post('USER_ID', 0);
        $location_id = Yii::$app->request->post('LOCATION_ID', 0);
        $payment_channel = Yii::$app->request->post('PAYMENT_CHANNEL', APP_UTILS::PAYMENT_METHOD_MOBILE);


        $date = APP_UTILS::GetCurrentDateTime();
        $order_payment_arr = [
            'CUSTOMER_ORDERS' => [
                'USER_ID' => $user_id,
                'LOCATION_ID' => $location_id,
                'PAYMENT_METHOD' => $payment_channel,
                'ORDER_DATE' => $date
            ]
        ];

        return ORDER_HELPER::CreateOrderFromCart($user_id, $order_payment_arr);

    }

    public function actionUssd()
    {
        return ['USSD_NUMBER' => ORDER_HELPER::getUssdNumber()];
    }

}