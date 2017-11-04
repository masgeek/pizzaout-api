<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 1:33 PM
 */

namespace app\model_extended;


use app\helpers\APP_UTILS;
use app\models\OrderTracking;

class STATUS_TRACKING_MODEL extends OrderTracking
{

	/*public function rules()
	{
		$rules = parent::rules();

		$rules[] = [['COMMENTS'], 'required', 'on' => [APP_UTILS::SCENARIO_CREATE, APP_UTILS::SCENARIO_UPDATE]];
		return $rules;
	}

	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			$this->TRACKING_DATE = APP_UTILS::GetCurrentDateTime();
			return true;
		}
		return false;
	}*/
}