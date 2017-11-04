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
use app\helpers\APP_UTILS;
use app\models\Users;
use app\models\UserType;
use yii\db\Expression;

class USER_MODEL extends Users
{
	public $CHANGE_PASSWORD;

	const SCENARIO_CREATE = 'create';
	const SCENARIO_UPDATE = 'update';


	public function scenarios()
	{
		$scenarios = parent::scenarios();
		$scenarios[SELF::SCENARIO_CREATE] = ['SURNAME', 'OTHER_NAMES', 'MOBILE', 'EMAIL', 'LOCATION_ID', 'USER_NAME', 'PASSWORD', 'USER_TYPE'];
		$scenarios[SELF::SCENARIO_UPDATE] = ['SURNAME', 'OTHER_NAMES', 'MOBILE', 'EMAIL', 'LOCATION_ID', 'USER_NAME', 'PASSWORD', 'USER_TYPE'];

		return $scenarios;
	}

	public function rules()
	{
		$rules = parent::rules();

		$rules[] = [['EMAIL'], 'unique', 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE]];
		$rules[] = [['PASSWORD'], 'string', 'min' => 1, 'on' => [self::SCENARIO_CREATE, self::SCENARIO_UPDATE]];
		return $rules;
	}

	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				$this->DATE_REGISTERED = new Expression(APP_UTILS::GetCurrentTime());
			}
			$this->LAST_UPDATED = new Expression(APP_UTILS::GetCurrentTime());

			return true;
		}
		return false;
	}

	public function attributeLabels()
	{
		$labels = parent::attributeLabels();

		return $labels;
	}

	public function fields()
	{
		$fields = parent::fields();

		$fields['USER_TYPE'] = function ($model) {
			/* @var $model USER_MODEL */
			return UserType::findOne($model->USER_TYPE)->USER_TYPE_NAME;
		};
		//unset($fields['PASSWORD']); //remove the password field
		return $fields;
	}
}