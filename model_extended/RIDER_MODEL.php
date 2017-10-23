<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 2:18 PM
 */

namespace app\model_extended;


use app\models\Riders;
use yii\helpers\ArrayHelper;

class RIDER_MODEL extends Riders
{
	public static function GetRiders($kitchen_id)
	{
		$chefs = self::find()
			->where(['KITCHEN_ID' => $kitchen_id])
			->all();

		$listData = ArrayHelper::map($chefs, 'RIDER_ID', 'RIDER_NAME');

		return $listData;
	}
}