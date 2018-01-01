<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/17/2017
 * Time: 3:45 PM
 */

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\LOCATION_MODEL;
use Yii;
use app\api\modules\v1\models\CUSTOMER_ORDER_ITEM;
use app\api\modules\v1\models\CUSTOMER_ORDER_MODEL;
use app\api\modules\v1\models\PAYMENT_MODEL;
use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
use app\models_search\OrdersSearch;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\rest\ActiveController;

class OrderController extends ActiveController
{
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\CUSTOMER_ORDER_MODEL';


    /**
     * @param $user_id
     * @return CUSTOMER_ORDER_MODEL
     * @throws \yii\base\InvalidConfigException
     */
    public function actionPay($user_id)
    {
        //create fictitious order
        $customerOrder = new CUSTOMER_ORDER_MODEL();
        $orderItems = new CUSTOMER_ORDER_ITEM();
        $paymentDetail = new PAYMENT_MODEL();

        $date = APP_UTILS::GetCurrentDateTime();

        $order_status = ORDER_HELPER::STATUS_ORDER_PENDING;
        $location = LOCATION_MODEL::find()->one();
        $post = [
            'PAYMENT_MODEL' => [
                'PAYMENT_REF' => strtoupper(uniqid('PIZZA_')),
                'PAYMENT_CHANNEL' => 'MOBILE',
                'PAYMENT_AMOUNT' => 1200,
                'PAYMENT_STATUS' => $order_status,
                'PAYMENT_NUMBER' => '097895689',
                'PAYMENT_NOTES' => 'N/A',
            ],
            'CUSTOMER_ORDER_ITEM' => [
                'ITEM_TYPE_ID' => 1,
                'QUANTITY' => 2,
                'PRICE' => 15,
                'SUBTOTAL' => 30,
                'OPTIONS' => 'N/A',
                'NOTES' => 'Test Order',
            ],
            'CUSTOMER_ORDER_MODEL' => [
                'USER_ID' => $user_id,
                'LOCATION_ID' => $location->LOCATION_ID,
                //'ORDER_QUANTITY' => 2,
                //'ORDER_PRICE' => 1200,
                'PAYMENT_METHOD' => 'MOBILE',
                'ORDER_STATUS' => $order_status,
                'NOTES' => 'EXTRA CHEESE',
            ]
        ];

        $customerOrder->load($post);
        $orderItems->load($post);
        $paymentDetail->load($post);

        $customerOrder->ORDER_DATE = $date;

        if ($customerOrder->save()) {
            $orderItems->CREATED_AT = $date;
            $orderItems->ORDER_ID = $customerOrder->ORDER_ID;

            $paymentDetail->PAYMENT_DATE = $date;
            $paymentDetail->ORDER_ID = $customerOrder->ORDER_ID;

            $orderItems->save();
            $paymentDetail->save();
        }
        $customerOrder->validate();
        $orderItems->validate();
        $paymentDetail->validate();

        return $customerOrder;
    }


    /**
     * @param $user_id
     * @return ActiveDataProvider
     */
    public function actionMyOrders($user_id)
    {
        $order_type_post = Yii::$app->request->post('ORDER_TYPE', 'CONFIRMED');
        $order_type = strtoupper($order_type_post);
        return $this->getOrders($order_type, $user_id);
    }

    /**
     * @param $user_id
     * @return ActiveDataProvider
     */
    public function actionActiveOrders($user_id)
    {
        $order_type_post = Yii::$app->request->post('ORDER_TYPE', 'ACTIVE');
        $order_type = strtoupper($order_type_post);
        return $this->getOrders($order_type, $user_id);
    }

    /**
     * @param $rider_id
     * @return ActiveDataProvider
     */
    public function actionRiderOrders($rider_id)
    {
        $order_type_post = Yii::$app->request->post('ORDER_TYPE', 'ACTIVE');
        $order_type = strtoupper($order_type_post);
        return $this->getOrders($order_type, $rider_id);
    }

    /**
     * @param $order_type
     * @param $user_id
     * @param null $rider_id
     * @return array|ActiveDataProvider
     */
    private function getOrders($order_type, $user_id, $rider_id = null)
    {
        $query = CUSTOMER_ORDER_MODEL::find();
        if ($rider_id != null) {
            $query->andWhere(['RIDER_ID' => $rider_id]);
        } else {
            $query->andWhere(['USER_ID' => $user_id]);
        }

        switch ($order_type) {
            case 'ACTIVE':
                $order_status = $this->activeOrders();
                break;
            case 'CONFIRMED':
                $order_status = $this->confirmedOrders();
                break;
            case 'CANCELLED':
                $order_status = $this->cancelledOrders();
                break;
            case 'UNPAID':
                $order_status = $this->unpaidOrders();
                break;
            case 'PENDING':
                $order_status = $this->pendingOrders();
                break;
            case 'DISPATCHED':
                $order_status = $this->dispatchedOrders();
                break;
            case 'DELIVERED':
                $order_status = $this->deliveredOrders();
                break;
            default:
                return [];

        }

        $query->andWhere(['ORDER_STATUS' => $order_status]);

        return new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
            /*'pagination' => [
                'pageSize' => 200,
            ],*/
            'sort' => [
                'defaultOrder' => [
                    'ORDER_DATE' => SORT_DESC,
                ]
            ],
        ]);


    }

    /**
     * @return array
     */
    private function activeOrders()
    {
        return [
            ORDER_HELPER::STATUS_ORDER_PENDING,
            ORDER_HELPER::STATUS_PAYMENT_PENDING,
            ORDER_HELPER::STATUS_ORDER_CONFIRMED,
            ORDER_HELPER::STATUS_CHEF_ASSIGNED,
            ORDER_HELPER::STATUS_PAYMENT_CONFIRMED,
            ORDER_HELPER::STATUS_UNDER_PREPARATION,
            ORDER_HELPER::STATUS_AWAITING_RIDER,
            ORDER_HELPER::STATUS_RIDER_DISPATCHED,
            ORDER_HELPER::STATUS_KITCHEN_ASSIGNED
        ];

    }

    private function confirmedOrders()
    {
        return [
            ORDER_HELPER::STATUS_ORDER_CONFIRMED,
            ORDER_HELPER::STATUS_CHEF_ASSIGNED,
            ORDER_HELPER::STATUS_PAYMENT_CONFIRMED,
            ORDER_HELPER::STATUS_UNDER_PREPARATION,
            ORDER_HELPER::STATUS_AWAITING_RIDER,
            ORDER_HELPER::STATUS_RIDER_DISPATCHED
        ];

    }

    private function unpaidOrders()
    {
        return [ORDER_HELPER::STATUS_PAYMENT_PENDING];

    }

    private function pendingOrders()
    {
        return [ORDER_HELPER::STATUS_ORDER_PENDING];

    }

    private function cancelledOrders()
    {
        return [ORDER_HELPER::STATUS_ORDER_CANCELLED];
    }

    private function dispatchedOrders()
    {
        return [ORDER_HELPER::STATUS_RIDER_DISPATCHED, ORDER_HELPER::STATUS_RIDER_ASSIGNED];
    }

    private function deliveredOrders()
    {
        return [ORDER_HELPER::STATUS_ORDER_DELIVERED];
    }
}