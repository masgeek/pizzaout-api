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

		$username = $request->user_name;
		$password = sha1($request->password);

		$user = USER_MODEL::findOne(['User_Name' => $username, 'Password' => $password]);
		if ($user == null) {//search based on email address
			$user = USER_MODEL::findOne(['Email' => $username, 'Password' => $password]);
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

	public function actionRecover()
	{

	}

	public function actionRegister()
	{

		/* @var $request USER_MODEL */
		$message = [];

		if (!Yii::$app->request->isPost) {
			throw new BadRequestHttpException('Please use POST');
		}
		$request = ['USER_MODEL' => Yii::$app->request->post()];

		return $request;
		$plain_pass = Yii::$app->request->post('Password');
		$user = new USER_MODEL();
		$user->setScenario(USER_MODEL::SCENARIO_CREATE);
		$user->load($request);
		if ($user->validate()) {
			$user->Password = sha1($plain_pass);
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
		$request = (object)Yii::$app->request->bodyParams;
		$user->Surname = isset($request->Surname) ? $request->Surname : $user->Surname;
		$user->Email = isset($request->Email) ? $request->Email : $user->Email;
		$user->Mobile = isset($request->Mobile) ? $request->Mobile : $user->Mobile;
		$user->Other_Names = isset($request->Other_Names) ? $request->Other_Names : $user->Other_Names;
		if (isset($request->CHANGE_PASSWORD)) {
			$user->Password = sha1($request->Password);
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

	public function actionAccountType()
	{
		return [
			'CUSTOMER', 'VENDOR'
		];
	}
}