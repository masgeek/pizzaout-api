<?php

namespace app\controllers;

use app\model_extended\USERS_MODEL;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * UserController implements the CRUD actions for USERS_MODEL model.
 */
class UserController extends Controller
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
                'except' => ['register', 'reset-pass'],
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

    public function beforeAction($action)
    {
        /*Yii::$app->getView()->theme = new Theme([
            'basePath' => '@app/themes/omnifood',
            'baseUrl' => '@web/themes/omnifood',
            'pathMap' => [
                '@app/views' => '@app/themes/omnifood',
            ],
        ]);
*/
        return parent::beforeAction($action); //
    }

    /**
     * Lists all USERS_MODEL models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => USERS_MODEL::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single USERS_MODEL model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new USERS_MODEL model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionRegister()
    {
        $this->layout = 'register_layout';

        $model = new USERS_MODEL();

        //$model->USER_TYPE = 1;
        //$model->LOCATION_ID = 1;
        if ($model->load(Yii::$app->request->post())) {

            $post = Yii::$app->request->post('USERS_MODEL');
            $password = $post['PASSWORD'];
            $model->PASSWORD = sha1($password);
            $model->RESET_TOKEN = 'NONE';
            if ($model->save()) {
                //go to login page
                return $this->redirect(['//site/login']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing USERS_MODEL model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->USER_ID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionResetPass($token)
    {
        $this->layout = 'login_layout';
        $this->view->title = 'Change Password';
        $model = USERS_MODEL::findByToken($token);
        if($model!=null) {
            if ($model->load(Yii::$app->request->post())) {

                $post = Yii::$app->request->post('USERS_MODEL');
                $password = $post['PASSWORD'];
                $model->PASSWORD = sha1($password);
                $model->RESET_TOKEN = 'NONE';
                if ($model->save()) {
                    //go to login page
                    return $this->redirect(['//site/login']);
                }
            }

            return $this->render('_change-password', [
                'model' => $model,
            ]);
        }
        return $this->redirect(['//site/login']);
    }

    /**
     * Deletes an existing USERS_MODEL model.
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
     * Finds the USERS_MODEL model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return USERS_MODEL the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = USERS_MODEL::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
