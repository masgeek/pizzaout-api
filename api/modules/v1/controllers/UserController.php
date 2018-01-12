<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\ACCOUNT_TYPE_MODEL;
use app\api\modules\v1\models\API_TOKEN_MODEL;
use app\api\modules\v1\models\SERVICE_MODEL;
use app\api\modules\v1\models\USER_MODEL;
use app\helpers\APP_UTILS;
use app\models\ContactForm;
use Yii;
use yii\helpers\Url;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

class UserController extends ActiveController
{
    private $_apiToken = 0;
    private $_userID = 0;
    /**
     * @var object
     */
    public $modelClass = 'app\api\modules\v1\models\USER_MODEL';

    /**
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();

        //unset($actions['create']);
        unset($actions['index']);
        //unset($actions['delete']);
        return $actions;
    }

    /**
     * @param string $action
     * @param null $model
     * @param array $params
     * @throws \yii\web\ForbiddenHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        //private $_apiToken = 0;
        //private $_userID = 0;
        if ($this->_apiToken == 0 or $this->_userID == 0) {
            $this->_apiToken = Yii::$app->request->headers->get("api-token", null);
            $this->_userID = Yii::$app->request->headers->get("user-id", null);
        }

        if ($this->_apiToken == null or $this->_userID == null) {
            throw new \yii\web\ForbiddenHttpException("You can't $action this section. {$this->_apiToken} {$this->_userID} ");
        }
        //check if the token is valid
        if (!API_TOKEN_MODEL::IsValidToken($this->_apiToken, $this->_userID)) {
            throw new \yii\web\ForbiddenHttpException('Invalid token, access denied');
        }
    }

    /**
     * @return array|null|static
     * @throws BadRequestHttpException
     * @throws \yii\base\Exception
     * @throws \yii\base\InvalidConfigException
     */
    public function actionLogin()
    {
        /* @var $request USER_MODEL */
        if (!Yii::$app->request->isPost) {
            throw new BadRequestHttpException('Please use POST');
        }
        $request = (object)Yii::$app->request->post();

        $username = $request->USER_NAME;
        $password = sha1($request->PASSWORD);

        $user = USER_MODEL::findOne(['USER_NAME' => $username, 'PASSWORD' => $password]);
        if ($user == null) {//search based on email address
            $user = USER_MODEL::findOne(['EMAIL' => $username, 'PASSWORD' => $password]);
        }

        if ($user != null) {
            $message = $user;

            //create the api token too
            API_TOKEN_MODEL::CreateApiToken($user->USER_ID);
        } else {
            $message = [
                'status' => false,
                'message' => 'Invalid Username/Password'
            ];
        }

        return $message;
    }

    /**
     * @return array
     * @throws BadRequestHttpException
     * @throws \yii\base\Exception
     */
    public function actionRecover()
    {
        /* @var $request USER_MODEL */
        if (!Yii::$app->request->isPost) {
            throw new BadRequestHttpException('Please use POST');
        }
        $username = Yii::$app->request->post('USER_NAME');

        $user = USER_MODEL::find()
            ->where(['USER_NAME' => $username])
            ->orWhere(['EMAIL' => $username])
            ->one();//findOne(['USER_NAME' => $username]);


        $emailsent = APP_UTILS::SendRecoveryEmail($user);

return $emailsent;
        return [
            'RESET_SENT' => $emailsent ? true : false,
            'MESSAGE' => $emailsent ? 'A Password reset link has been sent to your registered  email' : 'No matching username found, please check and try again'
        ];
    }

    /**
     * @return array
     * @throws BadRequestHttpException
     */
    public function actionRegister()
    {
        /* @var $request USER_MODEL */
        $message = [];

        if (!Yii::$app->request->isPost) {
            throw new BadRequestHttpException('Please use POST');
        }
        $request = ['USER_MODEL' => Yii::$app->request->post()];

        $plain_pass = Yii::$app->request->post('PASSWORD');
        $user = new USER_MODEL();
        $user->setScenario(USER_MODEL::SCENARIO_CREATE);
        $user->load($request);
        if ($user->validate()) {
            $user->PASSWORD = sha1($plain_pass);
            if ($user->save()) {
                $message = [$user];
            }
        } else {
            $errors = $user->getErrors();
            foreach ($errors as $key => $error) {
                $message[] = [
                    'field' => $key,
                    'message' => $error[0]
                ];
            }
        }
        return $message;
    }

    /**
     * @param $id
     * @return array|null|static
     * @throws BadRequestHttpException
     * @throws NotFoundHttpException
     */
    public function actionUpdates($id)
    {
        /* @var $request USER_MODEL */
        $message = [];

        if (!Yii::$app->request->isPut) {
            throw new BadRequestHttpException('Please use PUT');
        }

        $user = USER_MODEL::findOne($id);
        if ($user == null) {
            throw new NotFoundHttpException('User not found', 5);
        }


        $user->setScenario(USER_MODEL::SCENARIO_UPDATE);
        $request = (object)YII::$APP->REQUEST->BODYPARAMS;
        $user->SURNAME = ISSET($request->SURNAME) ? $request->SURNAME : $user->SURNAME;
        $user->EMAIL = ISSET($request->EMAIL) ? $request->EMAIL : $user->EMAIL;
        $user->MOBILE = ISSET($request->MOBILE) ? $request->MOBILE : $user->MOBILE;
        $user->OTHER_NAMES = ISSET($request->OTHER_NAMES) ? $request->OTHER_NAMES : $user->OTHER_NAMES;
        if (isset($request->CHANGE_PASSWORD)) {
            $user->PASSWORD = sha1($request->PASSWORD);
        }

        if ($user->validate() && $user->save()) {
            $message = $user;
        } else {
            $errors = $user->getErrors();
            foreach ($errors as $key => $error) {
                $message[] = [
                    'field' => $key,
                    'message' => $error[0]
                ];
            }
        }

        return $message;
    }

    /**
     * @return array
     */
    public function actionAccountType()
    {
        return [
            'CUSTOMER', 'RIDER'
        ];
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionIndex()
    {
        $recipient = ["barsamms@gmail.com" => 'Sammy Barasa'];
        $subject = 'Subject here';
        $body = '<h2>Mesage body</h2>';

        $params = [
            'name' => 'Sammy Barasa M',
            'email' => $recipient,
            'subject' => $subject,
            'link' => Url::to('@web/user/recover', true),
            'content' => $body
        ];
        $mailer = APP_UTILS::SendEmail($subject, $recipient, $params, 'layouts/password_recovery');


        return $mailer;

    }
}