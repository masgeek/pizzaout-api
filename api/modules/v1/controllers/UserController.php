<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/16/2017
 * Time: 8:47 PM
 */

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\ACCOUNT_TYPE_MODEL;
use app\api\modules\v1\models\SERVICE_MODEL;
use app\api\modules\v1\models\USER_MODEL;
use Yii;
use yii\data\ActiveDataProvider;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\rest\ActiveController;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\Response;

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

		$plain_pass = Yii::$app->request->post('Password');
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
		$request = (OBJECT)YII::$APP->REQUEST->BODYPARAMS;
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