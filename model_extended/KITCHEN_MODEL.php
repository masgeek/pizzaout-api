<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 2:23 PM
 */

namespace app\model_extended;


use app\models\Kitchen;
use yii\helpers\ArrayHelper;

class KITCHEN_MODEL extends Kitchen
{
	public static function GetKitchens(array $scope = ['OFFICE', 'ALL'])
	{
		$kitchen = self::find()
			->where(['SCOPE' => $scope])
			->all();

		$listData = ArrayHelper::map($kitchen, 'KITCHEN_ID', 'KITCHEN_NAME');

		return $listData;
	}
}