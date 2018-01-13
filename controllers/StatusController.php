<?php

namespace app\controllers;

use Yii;
use app\model_extended\STATUS_MODEL;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StatusController implements the CRUD actions for STATUS_MODEL model.
 */
class StatusController extends Controller
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
     * Lists all STATUS_MODEL models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->view->title = Yii::t('app', 'Order Status Management');
        $dataProvider = new ActiveDataProvider([
            'query' => STATUS_MODEL::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single STATUS_MODEL model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);;
        $this->view->title = Yii::t('app', 'View Status: {nameAttribute}', [
            'nameAttribute' => $model->STATUS_NAME,
        ]);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new STATUS_MODEL model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->view->title = Yii::t('app', 'Add New Status');
        $model = new STATUS_MODEL();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->STATUS_NAME]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing STATUS_MODEL model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $this->view->title = Yii::t('app', 'Update Status: {nameAttribute}', [
            'nameAttribute' => $model->STATUS_NAME,
        ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->STATUS_NAME]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing STATUS_MODEL model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the STATUS_MODEL model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return STATUS_MODEL the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = STATUS_MODEL::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
