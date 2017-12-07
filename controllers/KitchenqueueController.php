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
 * KitchenqueueController implements the CRUD actions for CUSTOMER_ORDERS model.
 */
class KitchenqueueController extends Controller
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
        $this->view->title = 'Kitchen Queue';
        $searchModel = new OrdersSearch();
        $kitchenAllocated = $searchModel->searchKitchenQueue(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_KITCHEN_ASSIGNED]);
        $chefAssigned = $searchModel->searchKitchenQueue(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_CHEF_ASSIGNED]);
        $preparingOrder = $searchModel->searchKitchenQueue(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_UNDER_PREPARATION]);
        $orderReady = $searchModel->searchKitchenQueue(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_ORDER_READY]);
        $awaitingRider = $searchModel->searchKitchenQueue(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_AWAITING_RIDER]);
        $allocatedRider = $searchModel->searchKitchenQueue(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_RIDER_ASSIGNED]);
        $dispatchRider = $searchModel->searchKitchenQueue(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_RIDER_DISPATCHED]);

        return $this->render('/kitchenqueue/index', [
            'searchModel' => $searchModel,
            'kitchenAllocated' => $kitchenAllocated,
            'allocatedRider' => $allocatedRider,
            'orderReady' => $orderReady,
            'chefAssigned' => $chefAssigned,
            'dispatchRider' => $dispatchRider,
            'preparingOrder' => $preparingOrder,
            'awaitingRider' => $awaitingRider,
        ]);
    }

    /**
     * Updates an existing CUSTOMER_ORDERS model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
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

        return $this->render('/kitchenqueue/update', [
            'model' => $model,
            'tracker' => $tracker
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     */

    public function actionAssignChef($id)
    {
        $this->view->title = "Assign Chef to order #{$id}";
        $model = $this->findModel($id);

        $model->scenario = APP_UTILS::SCENARIO_ASSIGN_CHEF;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $scope = [
            APP_UTILS::KITCHEN_SCOPE,
        ];
        $workflow = ORDER_HELPER::NextWorkFlow($id, $scope);

        return $this->render('assign_chef', [
            'model' => $model,
            'scope' => $scope,
            'workflow' => $workflow
        ]);
    }


    public function actionPrepareOrder($id)
    {
        $this->view->title = "Prepare Order #{$id}";
        $model = $this->findModel($id);

        $model->scenario = APP_UTILS::SCENARIO_PREPARE_ORDER;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $scope = [
            APP_UTILS::CHEF_SCOPE,
        ];
        $workflow = ORDER_HELPER::NextWorkFlow($id, $scope);

        return $this->render('assign_chef', [
            'model' => $model,
            'scope' => $scope,
            'workflow' => $workflow
        ]);
    }

    public function actionOrderReady($id)
    {
        $this->view->title = "Order #{$id} Is Ready";
        $model = $this->findModel($id);

        $model->scenario = APP_UTILS::SCENARIO_PREPARE_ORDER;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $scope = [
            APP_UTILS::KITCHEN_SCOPE,
        ];
        $workflow = ORDER_HELPER::NextWorkFlow($id, $scope);

        return $this->render('assign_chef', [
            'model' => $model,
            'scope' => $scope,
            'workflow' => $workflow
        ]);
    }

    public function actionUpdateRider($id, $workflow)
    {
        $this->view->title = "Update Order #{$id} a rider";
        $model = $this->findModel($id);

        $model->scenario = APP_UTILS::SCENARIO_ASSIGN_RIDER;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        $scope = [
            APP_UTILS::KITCHEN_SCOPE,
        ];
        $workflow = ORDER_HELPER::NextWorkFlow($id, $scope);
        return $this->render('assign_chef', [
            'model' => $model,
            'scope' => $scope,
            'workflow' => $workflow
        ]);
    }

    public function actionView($id)
    {
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
