<?php

namespace app\controllers;

use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
use app\model_extended\CUSTOMER_ORDERS;
use app\model_extended\STATUS_TRACKING_MODEL;
use app\models_search\OrdersSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * OrdersController implements the CRUD actions for CUSTOMER_ORDERS model.
 */
class OrdersController extends Controller
{
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
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
    public function actionIndex()
    {
        $this->view->title = 'Orders';
        $searchModel = new OrdersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, [
            ORDER_HELPER::STATUS_PAYMENT_CONFIRMED,
            ORDER_HELPER::STATUS_UNDER_PREPARATION,
            ORDER_HELPER::STATUS_RIDER_DISPATCHED
        ]);

        $pendingOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_ORDER_PENDING, ORDER_HELPER::STATUS_PAYMENT_PENDING]);
        $confirmedOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_ORDER_CONFIRMED]);
        $closedOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_PAYMENT_CONFIRMED]);

        $orderReady = $searchModel->search(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_ORDER_READY]);

        $cancelledOrder = $searchModel->search(Yii::$app->request->queryParams, [ORDER_HELPER::STATUS_ORDER_CANCELLED]);

        return $this->render('/orders/index', [
            'searchModel' => $searchModel,
            'pendingOrder' => $pendingOrder,
            'confirmedOrder' => $confirmedOrder,
            'closedOrder' => $closedOrder,
            'cancelledOrder' => $cancelledOrder
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


    public function actionTestMail($id)
    {

        $this->view->title = "Order #{$id}";
        $model = $this->findModel($id);
        $model->scenario = APP_UTILS::SCENARIO_CONFIRM_ORDER;

        return APP_UTILS::SendOrderEmailWithReceipt($model->uSER, $model->ORDER_ID, $model->oRDERSTATUS->STATUS_NAME);

    }

    /**
     * Updates an existing CUSTOMER_ORDERS model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionConfirmOrder($id)
    {

        $this->view->title = "Order #{$id}";
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                if ($model->ORDER_STATUS === ORDER_HELPER::STATUS_ORDER_CANCELLED) {
                    Yii::$app->session->setFlash('info', 'Order has been cancelled');
                } else {
                    Yii::$app->session->setFlash('success', 'Order confirmed successfully');
                }
                return $this->redirect(['orders/index']);;
            }
        }

        $scope = [
            APP_UTILS::OFFICE_SCOPE,
            APP_UTILS::ALL_SCOPE
        ];
        $workflow = ORDER_HELPER::NextWorkFlow($id, $scope);

        return $this->render('confirm-order', [
            'model' => $model,
            'scope' => $scope,
            'workflow' => $workflow
        ]);
    }

    /**
     * @param $id
     * @param null $token
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionPrint($id, $token = null)
    {
        if ($token != null) {
            //change layout
            $this->layout = 'register_layout';
        }
        $this->view->title = 'Order Receipt #' . $id;
        return $this->render('print-receipt', [
            'model' => $this->findModel($id),
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

    public function actionGetKitchen()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $cat_id = $parents[0];
                $chefs = \app\model_extended\CHEF_MODEL::GetChefs($cat_id, true);
                foreach ($chefs as $key => $value) {
                    $out[] = [
                        'id' => $value->CHEF_ID,
                        'name' => $value->CHEF_NAME
                    ];
                }
                return Json::encode(['output' => $out, 'selected' => '']);
            }
        }
        return Json::encode(['output' => '', 'selected' => '']);
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
