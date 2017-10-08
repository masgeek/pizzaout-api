<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/17/2017
 * Time: 12:33 PM
 */

namespace app\api\modules\v1\models;

/*
 * User_ID
Surname
Other_Names
Mobile
Email
Location_ID
User_Name
Password
User_Type

 */
use app\models\Users;
use app\models\UserType;

class USER_MODEL extends Users
{
	public $CHANGE_PASSWORD;

	const SCENARIO_CREATE = 'create';
	const SCENARIO_UPDATE = 'update';


	public function scenarios()
	{
		$scenarios = parent::scenarios();
		$scenarios[self::SCENARIO_CREATE] = ['Surname', 'Other_Names', 'Mobile', 'Email', 'Location_ID', 'User_Name', 'Password', 'User_Type'];
		$scenarios[self::SCENARIO_UPDATE] = ['Surname', 'Other_Names', 'Mobile', 'Email', 'Location_ID', 'User_Name', 'Password', 'User_Type'];

		return $scenarios;
	}

	public function rules()
	{
		$rules = parent::rules();

		$rules[] = [['Email'], 'unique', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE]];
		$rules[] = [['Password'], 'string', 'min' => 1, 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE]];
		return $rules;
	}

	public function attributeLabels()
	{
		$labels = parent::attributeLabels();

		return $labels;
	}

	public function fields()
	{
		$fields = parent::fields();

		$fields['User_Type'] = function ($model) {
			/* @var $model USER_MODEL */
			return UserType::findOne($model->User_Type)->Type_Name;
		};
		unset($fields['Password']); //remove the password field
		return $fields;
	}
}