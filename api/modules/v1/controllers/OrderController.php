<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/17/2017
 * Time: 3:45 PM
 */

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\API_TOKEN_MODEL;
use app\api\modules\v1\models\CUSTOMER_ORDER_MODEL;
use app\helpers\ORDER_HELPER;
use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class OrderController extends ActiveController
{
    private $_apiToken = 0;
    private $_userID = 0;
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\CUSTOMER_ORDER_MODEL';

    /**
     * @param string $action
     * @param null $model
     * @param array $params
     * @throws \yii\web\ForbiddenHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        //private $_apiToken = 0;
        //private $_userID = 0;
        if ($this->_apiToken == 0 or $this->_userID == 0) {
            $this->_apiToken = Yii::$app->request->headers->get("api-token", null);
            $this->_userID = Yii::$app->request->headers->get("user-id", null);
        }

        if ($this->_apiToken == null or $this->_userID == null) {
            throw new \yii\web\ForbiddenHttpException("You can't $action this section. {$this->_apiToken} {$this->_userID} ");
        }
        //check if the token is valid
        if (!API_TOKEN_MODEL::IsValidToken($this->_apiToken, $this->_userID)) {
            throw new \yii\web\ForbiddenHttpException('Invalid token, access denied');
        }
    }

    /**
     * @param $user_id
     * @return ActiveDataProvider
     * @throws \yii\web\ForbiddenHttpException
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
        //$this->checkAccess('rider-orders');
        $order_type_post = Yii::$app->request->post('ORDER_TYPE', 'UNPAID');
        $order_type = strtoupper($order_type_post);
        return $this->getOrders($order_type, null, $rider_id);
    }

    /**
     * @param $order_type
     * @param $user_id
     * @param int $rider_id
     * @return array|ActiveDataProvider
     */
    private function getOrders($order_type, $user_id, $rider_id = null)
    {

        $query = CUSTOMER_ORDER_MODEL::find();
        if ($rider_id != null) {
            $query->where(['RIDER_ID' => $rider_id]);
        } else {
            $query->where(['USER_ID' => $user_id]);
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