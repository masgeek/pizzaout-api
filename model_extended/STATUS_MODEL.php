<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 1:18 PM
 */

namespace app\model_extended;


use app\models\Status;
use yii\helpers\ArrayHelper;

class STATUS_MODEL extends Status
{
	public static function GetStatus()
	{
		$status = self::find()->all();

		$listData = ArrayHelper::map($status, 'STATUS_NAME', 'STATUS_NAME');

		return $listData;
	}
}