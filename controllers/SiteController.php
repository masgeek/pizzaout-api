<?php

namespace app\controllers;

use app\helpers\APP_UTILS;
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


        $this->view->title = 'Pizza Slice';
        if (!Yii::$app->user->isGuest) {
            $userType = Yii::$app->user->identity->usertype;
            //check user Type and redirect accordingly
            if ($userType === APP_UTILS::USER_TYPE_CUSTOMER) {
                return $this->redirect(['//customer']); //redirect to the customer dashboard
            } elseif ($userType == APP_UTILS::USER_TYPE_ADMIN) {
                return $this->redirect(['//orders']); //redirect to orders management
            }
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
     * @return \yii\web\Response
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
    public function actionTerms()
    {
        return $this->render('terms');
    }
}
