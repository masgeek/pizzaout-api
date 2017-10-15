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
	public static function GetStatus(array $scope = ['OFFICE', 'ALL'])
	{
		$status = self::find()
			->where(['SCOPE' => $scope])
			->all();

		$listData = ArrayHelper::map($status, 'STATUS_NAME', 'STATUS_NAME');

		return $listData;
	}
}