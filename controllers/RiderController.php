<?php

namespace app\controllers;

use app\model_extended\USERS_MODEL;
use Yii;
use app\model_extended\RIDER_MODEL;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RiderController implements the CRUD actions for RIDER_MODEL model.
 */
class RiderController extends Controller
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
     * Lists all RIDER_MODEL models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => RIDER_MODEL::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RIDER_MODEL model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RIDER_MODEL model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RIDER_MODEL();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->RIDER_ID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RIDER_MODEL model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->RIDER_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionAddRider()
    {
        $this->view->title = Yii::t('app', 'Add New Rider');
        $connection = \Yii::$app->db;
        $model = new RIDER_MODEL();
        $userModel = new USERS_MODEL();
        $model->RIDER_STATUS = true;

        if ($model->load(Yii::$app->request->post()) && $userModel->load(Yii::$app->request->post())) {
            //debug here
            //begin transactional saving
            $transaction = $connection->beginTransaction();

            $userModel->RESET_TOKEN = 'NONE';

            if ($userModel->save()) {
                $model->USER_ID = $userModel->USER_ID;
                //save the rider details on the table
                if ($model->save()) {
                    $transaction->commit();
                    return $this->redirect(['rider/index']);
                }
            } else {
                $transaction->rollBack(); //roll back in case we have an error
                // $this->refresh(); //reset the submissions
            }

        }

        return $this->render('add-rider', [
            'model' => $model,
            'userModel' => $userModel,
        ]);
    }

    /**
     * Deletes an existing RIDER_MODEL model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
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
     * Finds the RIDER_MODEL model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return RIDER_MODEL the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RIDER_MODEL::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
