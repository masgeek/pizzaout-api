<?php

namespace app\modules\cashsale\controllers;

use app\api\modules\v1\models\LOCATION_MODEL;
use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
use app\model_extended\CART_MODEL;
use app\model_extended\CUSTOMER_ORDER_ITEMS;
use app\model_extended\CUSTOMER_ORDERS;
use app\model_extended\CUSTOMER_PAYMENTS;
use app\model_extended\MENU_ITEMS;
use app\models\CustomerOrder;
use app\models\CustomerOrderItem;
use app\models\Payment;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Exception;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Default controller for the `cash-sale` module
 */
class PayController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ]
            ],
        ];
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex($id)
    {
        $this->layout = 'main';
        $this->view->title = "Pay for order no #{$id}";

        $orderModel = CustomerOrder::findOne($id);
        if ($orderModel == null) {
            throw new NotFoundHttpException('Order not found');
        }
        $model = new Payment();
        if ($model->load(Yii::$app->request->post())) {

            $model->generateUuid();
            $model->ORDER_ID = $id;
            $model->PAYMENT_CHANNEL = APP_UTILS::PAYMENT_METHOD_CASH;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Payment successfully processed');
                $this->redirect(['//orders/print', 'id' => $id]);
            }
            Yii::$app->session->setFlash('error', 'Unable to process payment');
        }

        return $this->render('order-payment', [
            'model' => $model,
            'orderModel' => $orderModel
        ]);


    }

    /**
     * @return false|string
     */
    public function actionComputeSale()
    {

        $amountDue = (float)Yii::$app->request->post('amountDue', 0);
        $amountReceived = (float)Yii::$app->request->post('amountReceived', 0);

        $change = ($amountReceived - $amountDue);

        $resp = [
            'change' => $change,
            'proceed' => $change >= 0
        ];
        return json_encode($resp);
    }
}
