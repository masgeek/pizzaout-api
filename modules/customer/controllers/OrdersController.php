<?php

namespace app\modules\customer\controllers;

use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
use app\model_extended\CUSTOMER_ORDERS;
use app\model_extended\STATUS_TRACKING_MODEL;
use app\models_search\OrdersSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * OrdersController implements the CRUD actions for CUSTOMER_ORDERS model.
 */
class OrdersController extends Controller
{
    public $layout = 'customer_layout_no_cart';

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
     * Lists all CUSTOMER_ORDERS models.
     * @return mixed
     */
    public function actionConfirmed()
    {
        $user_id = Yii::$app->user->id;
        $this->view->title = 'Confirmed Orders';
        $searchModel = new OrdersSearch();

        $dataProvider = $searchModel->searchCustomerOrders(Yii::$app->request->queryParams, [
            ORDER_HELPER::STATUS_ORDER_CONFIRMED,
            ORDER_HELPER::STATUS_CHEF_ASSIGNED,
            ORDER_HELPER::STATUS_PAYMENT_CONFIRMED,
            ORDER_HELPER::STATUS_UNDER_PREPARATION,
            ORDER_HELPER::STATUS_AWAITING_RIDER,
            ORDER_HELPER::STATUS_RIDER_DISPATCHED
        ], $user_id);

        return $this->render('orders_view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPending()
    {
        $this->layout = 'customer_layout';
        $user_id = Yii::$app->user->id;

        $this->view->title = 'Pending Orders';

        $this->view->params['cart_items'] = ORDER_HELPER::GetCartItems($user_id);

        $searchModel = new OrdersSearch();

        $pendingOrder = $searchModel->searchCustomerOrders(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_ORDER_PENDING, ORDER_HELPER::STATUS_PAYMENT_PENDING], $user_id);

        return $this->render('orders_view', [
            'searchModel' => $searchModel,
            'dataProvider' => $pendingOrder,
        ]);
    }

    public function actionClosed()
    {
        $user_id = Yii::$app->user->id;

        $this->view->title = 'Closed Orders';
        $searchModel = new OrdersSearch();

        $pendingOrder = $searchModel->searchCustomerOrders(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_ORDER_DELIVERED], $user_id);

        return $this->render('orders_view', [
            'searchModel' => $searchModel,
            'dataProvider' => $pendingOrder,
        ]);
    }

    public function actionCancelled()
    {
        $user_id = Yii::$app->user->id;

        $this->view->title = 'Cancelled Orders';
        $searchModel = new OrdersSearch();

        $pendingOrder = $searchModel->searchCustomerOrders(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_ORDER_CANCELLED], $user_id);

        return $this->render('orders_view', [
            'searchModel' => $searchModel,
            'dataProvider' => $pendingOrder,
        ]);
    }

    /**
     * Displays a single CUSTOMER_ORDERS model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionView($id)
    {
        $this->view->title = "Viewing Order #{$id}";

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /**
     * Finds the CUSTOMER_ORDERS model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return CUSTOMER_ORDERS the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CUSTOMER_ORDERS::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
