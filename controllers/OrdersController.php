<?php

namespace app\controllers;

use app\model_extended\KITCHEN_MODEL;
use app\model_extended\STATUS_TRACKING_MODEL;
use Yii;
use app\model_extended\CUSTOMER_ORDERS;
use app\models_search\OrdersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams, ['CONFIRMED', 'PREPARING', 'DELIVERY']);

		$pendingOrder = $searchModel->searchKitchenQueue(Yii::$app->request->queryParams, ['PREPARING']);
		$confirmedOrder = $searchModel->searchKitchenQueue(Yii::$app->request->queryParams, ['CONFIRMED']);
		$preparingOrder = $searchModel->searchKitchenQueue(Yii::$app->request->queryParams, ['PREPARING']);
		$completedOrder = $searchModel->searchKitchenQueue(Yii::$app->request->queryParams, ['COMPLETED', 'DELIVERED', 'DELIVERY']);
		$cancelledOrder = $searchModel->searchKitchenQueue(Yii::$app->request->queryParams, ['CANCELLED']);

		return $this->render('/orders/index', [
			'searchModel' => $searchModel,
			'pendingOrder' => $pendingOrder,
			'confirmedOrder' => $confirmedOrder,
			'preparingOrder' => $preparingOrder,
			'completedOrder' => $completedOrder,
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
		$model = $this->findModel($id);

		$tracker = new STATUS_TRACKING_MODEL();


		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$tracker->ORDER_ID = $model->ORDER_ID;
			$tracker->STATUS = $model->ORDER_STATUS;
			if ($tracker->load(Yii::$app->request->post()) && $tracker->save()) {
				//return $this->redirect(['update', 'id' => $model->ORDER_ID]);
				return $this->redirect(['index']);
			}
		}

		return $this->render('update', [
			'model' => $model,
			'tracker' => $tracker
		]);
	}

    /**
     * Deletes an existing CUSTOMER_ORDERS model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
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
