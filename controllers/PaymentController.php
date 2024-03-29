<?php

namespace app\controllers;

use app\model_extended\MY_PAYMENTS_MODEL;
use app\model_extended\MY_RESERVATIONS_VIEW;
use Yii;
use app\models\Payments;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaymentController implements the CRUD actions for Payments model.
 */
class PaymentController extends Controller
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
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					// allow authenticated users
					[
						'allow' => true,
						'roles' => ['@'],
					],
					// everything else is denied
				],
			],
		];
	}

	/**
	 * Lists all Payments models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$userid = Yii::$app->user->identity->id;
		$myReservationsArr = MY_RESERVATIONS_VIEW::MyReservationsArr($userid);


		$dataProvider = new ActiveDataProvider([
			'query' => MY_PAYMENTS_MODEL::find()
			//->where(['RESERVATION_ID' => $reservartions]),
		]);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionPendingPayments()
	{
		$userid = Yii::$app->user->identity->id;
		$myReservationsArr = MY_RESERVATIONS_VIEW::MyReservationsArr($userid);


		$dataProvider = new ActiveDataProvider([
			'query' => MY_PAYMENTS_MODEL::find()
				->where(['RESERVATION_ID' => $myReservationsArr])
				->andWhere(['PAYMENT_STATUS' => 0]),
		]);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionFinalizedPayments()
	{
		$userid = Yii::$app->user->identity->id;
		$myReservationsArr = MY_RESERVATIONS_VIEW::MyReservationsArr($userid);


		$dataProvider = new ActiveDataProvider([
			'query' => MY_PAYMENTS_MODEL::find()
				->where(['RESERVATION_ID' => $myReservationsArr])
				->andWhere(['PAYMENT_STATUS' => 1]),
		]);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
		]);
	}

	public function actionConfirmPayment()
	{

		$editable = (bool)Yii::$app->request->post('hasEditable');
		$out = Json::encode(['output' => '', 'message' => '']);
		$resp = '';
		if ($editable) {
			$payment_id = Yii::$app->request->post('editableKey');
			$model = $this->findModel($payment_id);

			$services_arr = Yii::$app->request->post('MY_PAYMENTS_MODEL');
			foreach ($services_arr as $services) {
				if (isset($services['PAYMENT_STATUS'])) {
					$model->PAYMENT_STATUS = isset($services['PAYMENT_STATUS']) ? $services['PAYMENT_STATUS'] : $model->PAYMENT_STATUS;
					$resp = $model->pAYMENTSTATUS->STATUS;
				}

				if (isset($services['COMMENTS'])) {
					$model->COMMENTS = isset($services['COMMENTS']) ? $services['COMMENTS'] : $model->COMMENTS;
					$resp = $model->COMMENTS;
				}

				if ($model->save()) {
					$out = ['output' => $resp, 'message' => ''];
				} else {
					$out = ['output' => '', 'message' => 'Unable to save'];
				}
			}
		}
		echo Json::encode($out);
	}

	/**
	 * Displays a single Payments model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Payments model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Payments();

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->PAYMENT_ID]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing Payments model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			return $this->redirect(['view', 'id' => $model->PAYMENT_ID]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Payments model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the Payments model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Payments the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Payments::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
