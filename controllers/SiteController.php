<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\LoginForm;
use Yii;
use yii\base\Theme;
use yii\filters\VerbFilter;
use yii\web\Controller;

class SiteController extends Controller
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
                    'logout' => ['post'],
                ],
            ],
            /*'access' => [
                 'class' => AccessControl::className(),
                 'except' => ['index', 'logout', 'login',],
                 'rules' => [
                     // allow authenticated users
                     [
                         'allow' => true,
                         'roles' => ['@'],
                     ],
                     // everything else is denied
                 ],
             ],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {


        Yii::$app->getView()->theme = new Theme([
            'basePath' => '@app/themes/omnifood',
            'baseUrl' => '@web/themes/omnifood',
            'pathMap' => [
                '@app/views' => '@app/themes/omnifood',
            ],
        ]);


        $this->view->title = 'Pizza Slice Test';
        if (!Yii::$app->user->isGuest) {
            // return $this->redirect(['//orders']);

        }
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {

        var_dump(5);
        die;
        $this->layout = 'login_layout';
        $this->view->title = 'User Sign In';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
