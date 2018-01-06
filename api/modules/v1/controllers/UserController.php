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
use app\models\ContactForm;
use Yii;
use yii\rest\ActiveController;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

class UserController extends ActiveController
{
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
        unset($actions['create']);
        //unset($actions['update']);
        return $actions;
    }

    /*public function checkAccess($action, $model = null, $params = [])
    {
        $api_token = Yii::$app->request->headers->get("api_token", null);
        $user_id = Yii::$app->request->headers->get("user_id", null);

        if ($api_token === null && $user_id === null) {
            throw new \yii\web\ForbiddenHttpException('You can\'t ' . $action . ' this product.');
        }
        //check if the token is valid
        if (!API_TOKEN_MODEL::IsValidToken($api_token, $user_id)) {
            throw new \yii\web\ForbiddenHttpException('Invalid token, access denied');
        }

    }*/

    public function actionLogin()
    {
        $data = Yii::$app->request->headers->get("api_token");//->getBodyParams();

        return $data;

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
     *
     */
    public function actionRecover()
    {
        /* @var $request USER_MODEL */
        if (!Yii::$app->request->isPost) {
            throw new BadRequestHttpException('Please use POST');
        }
        $username = Yii::$app->request->post('USER_NAME');

        $user = USER_MODEL::findOne(['USER_NAME' => $username]);

        //return $user;


        return [
            'RESET_SENT' => $user != null ? true : false,
            'MESSAGE' => $user != null ? 'A Password reset link has been sent to your registered  email' : 'No matching username found, please check and try again'
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
}