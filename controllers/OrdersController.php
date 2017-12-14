<?php

namespace app\controllers;

use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
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
            ORDER_HELPER::STATUS_PAYMENT_CONFIRMED,
            ORDER_HELPER::STATUS_UNDER_PREPARATION,
            ORDER_HELPER::STATUS_RIDER_DISPATCHED
        ]);

        $pendingOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_ORDER_PENDING]);
        $confirmedOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_ORDER_CONFIRMED]);
        $preparingOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_UNDER_PREPARATION]);

        $orderReady = $searchModel->search(Yii::$app->request->queryParams, [
            ORDER_HELPER::STATUS_ORDER_READY]);

        $cancelledOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_ORDER_CANCELLED]);

        return $this->render('/orders/index', [
            'searchModel' => $searchModel,
            'pendingOrder' => $pendingOrder,
            'confirmedOrder' => $confirmedOrder,
            'preparingOrder' => $preparingOrder,
            'orderReady' => $orderReady,
            'cancelledOrder' => $cancelledOrder
        ]);
    }

    /**
     * Updates an existing CUSTOMER_ORDERS model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionRider($id)
    {
        $model = $this->findModel($id);

        $tracker = new STATUS_TRACKING_MODEL();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $tracker->ORDER_ID = $model->ORDER_ID;
            $tracker->STATUS = $model->ORDER_STATUS;
            if ($tracker->save()) {
                return $this->redirect(['index']);
            }
        }

        return $this->render('rider', [
            'model' => $model,
            'tracker' => $tracker
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CUSTOMER_ORDERS model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CUSTOMER_ORDERS();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ORDER_ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CUSTOMER_ORDERS model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {

        $this->view->title = "Order #{$id}";
        $model = $this->findModel($id);
        $model->scenario = APP_UTILS::SCENARIO_CONFIRM_ORDER;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }


        $scope = [
            APP_UTILS::OFFICE_SCOPE,
            APP_UTILS::ALL_SCOPE
        ];
        $workflow = ORDER_HELPER::NextWorkFlow($id, $scope);

        return $this->render('update', [
            'model' => $model,
            'scope' => $scope,
            'workflow' => $workflow
        ]);
    }

    public function actionAssignKitchen($id)
    {
        $this->view->title = "Order #{$id}";
        $model = $this->findModel($id);
        $model->scenario = APP_UTILS::SCENARIO_ALLOCATE_KITCHEN;


        /*if (Yii::$app->request->isPost) {
            var_dump($_POST);
            die;
        }*/
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }


        $scope = [
            APP_UTILS::OFFICE_SCOPE
        ];

        $workflow = ORDER_HELPER::NextWorkFlow($id, $scope);

        return $this->render('assign_kitchen', [
            'model' => $model,
            'scope' => $scope,
            'workflow' => $workflow
        ]);
    }

    /**
     * Deletes an existing CUSTOMER_ORDERS model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
     * @throws \Exception
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
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
