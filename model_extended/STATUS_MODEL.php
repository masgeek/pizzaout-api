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
	/**
	 * @param       $order_id
	 * @param array $scope
	 * @return array
	 */
	public static function GetStatus($order_id, array $scope = ['ALL'])
	{

		$exclusion_list = self::StatusExclusionList($order_id);

		$status = self::find()
			->where(['SCOPE' => $scope])
			->andWhere(['NOT IN', 'STATUS_NAME', $exclusion_list])
			->orderBy(['RANK' => SORT_ASC])
			->all();

		$listData = ArrayHelper::map($status, 'STATUS_NAME', 'STATUS_DESC');

		return $listData;
	}

	/**
	 * @param $order_id
	 * @return array
	 */
	public static function StatusExclusionList($order_id)
	{
		$exclusion_list = [];
		$tracked_status = STATUS_TRACKING_MODEL::find()
			->select(['STATUS'])
			->where(['ORDER_ID' => $order_id])
			->asArray()
			->all();

		foreach ($tracked_status as $key => $value) {
			$exclusion_list[] = $value['STATUS'];
		}

		return $exclusion_list;
	}
}