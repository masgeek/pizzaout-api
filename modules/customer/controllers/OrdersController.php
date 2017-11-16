<?php

namespace app\modules\customer\controllers;

use app\helpers\APP_UTILS;
use app\helpers\ORDER_STATUS_HELPER;
use app\model_extended\CUSTOMER_ORDERS;
use app\model_extended\STATUS_TRACKING_MODEL;
use app\models_search\OrdersSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * OrdersController implements the CRUD actions for CUSTOMER_ORDERS model.
 */
class OrdersController extends Controller
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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CUSTOMER_ORDERS models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->view->title = 'Orders';
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, [
            ORDER_STATUS_HELPER::STATUS_PAYMENT_CONFIRMED,
            ORDER_STATUS_HELPER::STATUS_UNDER_PREPARATION,
            ORDER_STATUS_HELPER::STATUS_RIDER_DISPATCHED
        ]);

        $pendingOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_STATUS_HELPER::STATUS_ORDER_PENDING]);
        $confirmedOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_STATUS_HELPER::STATUS_ORDER_CONFIRMED]);
        $preparingOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_STATUS_HELPER::STATUS_UNDER_PREPARATION]);

        $orderReady = $searchModel->search(Yii::$app->request->queryParams, [
            ORDER_STATUS_HELPER::STATUS_ORDER_READY]);

        $cancelledOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_STATUS_HELPER::STATUS_ORDER_CANCELLED]);

        return $this->render('//orders/index', [
            'searchModel' => $searchModel,
            'pendingOrder' => $pendingOrder,
            'confirmedOrder' => $confirmedOrder,
            'preparingOrder' => $preparingOrder,
            'orderReady' => $orderReady,
            'cancelledOrder' => $cancelledOrder
        ]);
    }

    public function actionPending()
    {
        $this->view->title = 'Pending Orders';
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, [
            ORDER_STATUS_HELPER::STATUS_PAYMENT_CONFIRMED,
            ORDER_STATUS_HELPER::STATUS_UNDER_PREPARATION,
            ORDER_STATUS_HELPER::STATUS_RIDER_DISPATCHED
        ]);

        $pendingOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_STATUS_HELPER::STATUS_ORDER_PENDING]);
        $confirmedOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_STATUS_HELPER::STATUS_ORDER_CONFIRMED]);
        $preparingOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_STATUS_HELPER::STATUS_UNDER_PREPARATION]);

        $orderReady = $searchModel->search(Yii::$app->request->queryParams, [
            ORDER_STATUS_HELPER::STATUS_ORDER_READY]);

        $cancelledOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_STATUS_HELPER::STATUS_ORDER_CANCELLED]);

        return $this->render('//orders/index', [
            'searchModel' => $searchModel,
            'pendingOrder' => $pendingOrder,
            'confirmedOrder' => $confirmedOrder,
            'preparingOrder' => $preparingOrder,
            'orderReady' => $orderReady,
            'cancelledOrder' => $cancelledOrder
        ]);
    }
}
