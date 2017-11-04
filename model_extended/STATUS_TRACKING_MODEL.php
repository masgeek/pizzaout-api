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
use yii\db\Expression;

class STATUS_TRACKING_MODEL extends OrderTracking
{
	public function beforeValidate()
	{
		if (parent::beforeValidate()) {
			$this->TRACKING_DATE = new Expression(APP_UTILS::GetCurrentTime());
			return true;
		}

		return false;
	}
}