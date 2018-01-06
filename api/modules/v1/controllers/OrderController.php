<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/17/2017
 * Time: 3:45 PM
 */

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\CUSTOMER_ORDER_MODEL;
use app\helpers\ORDER_HELPER;
use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class OrderController extends ActiveController
{
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\CUSTOMER_ORDER_MODEL';

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

    /**
     * @param $user_id
     * @return ActiveDataProvider
     */
    public function actionMyOrders($user_id)
    {
        $this->checkAccess('my-orders');
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
        $this->checkAccess('active-orders');
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
        $this->checkAccess('rider-orders');
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