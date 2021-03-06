<?php

namespace app\controllers;

use app\helpers\APP_UTILS;
use app\model_extended\WP_CART_MODEL;
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


        $this->view->title = Yii::$app->name;
        if (!Yii::$app->user->isGuest) {
            $userType = Yii::$app->user->identity->usertype;
            //check user Type and redirect accordingly
            if ($userType === APP_UTILS::USER_TYPE_CUSTOMER) {
                //also check if wp cart has an item and redirect to the next selection stage
                $hasCartItems = WP_CART_MODEL::hasCartItems();
                if ($hasCartItems != null) {
                    return $this->redirect(['//wpcart']); //redirect to the customer dashboard
                }
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

    public function actionRecover()
    {
        $this->layout = 'login_layout';
        $this->view->title = 'Password Recovery';
        $message = '';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            $recover = (object)Yii::$app->request->post('LoginForm');
            $userModel = $model->recover($recover->email);
            if ($userModel != null) {
                //Generate recovery token
                APP_UTILS::SendRecoveryEmail($userModel);
                $message = '<strong>Success!</strong> A recovery email with instructions has been sent to your registered email';

            } else {
                $message = '<strong>Email Not Found!</strong> The Email you provided oes not appear to be registed on our system';
            }
            //$this->refresh();
        }
        return $this->render('recover', [
            'model' => $model,
            'message' => $message
        ]);

    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionMail()
    {
        $mailer = Yii::$app->mailer->compose('welcome')
            ->setFrom('support@pizzaout . so')
            ->setTo('barsamms@gmail . com')
            ->setSubject('Message subject')
            ->setTextBody('Plain text content')
            ->setHtmlBody(' < b>HTML content </b > ');

        return 'mail herre';

    }
}
