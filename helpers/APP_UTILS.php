<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 3:30 PM
 */

namespace app\helpers;


class APP_UTILS
{
	const KITCHEN_SCOPE = 'KITCHEN';
	const RIDER_SCOPE = 'RIDER';
	const OFFICE_SCOPE = 'OFFICE';
	const ALL_SCOPE = 'ALL';


	const SCENARIO_CREATE = 'create';
	const SCENARIO_UPDATE = 'update';
	const SCENARIO_DEFAULT = 'default';
	const SCENARIO_ALLOCATE_KITCHEN = 'allocate_kitchen';
	const SCENARIO_CONFIRM_ORDER = 'confirm_order';
	const SCENARIO_ASSIGN_CHEF = 'assign_chef';
	const SCENARIO_ASSIGN_RIDER = 'assign_rider';


	/**
	 * @return int
	 */
	public static function GetTimeStamp()
	{
		$date = new \DateTime();
		return $date->getTimestamp();
	}

	/**
	 * @return string
	 */
	public static function GetCurrentDateTime()
	{
		return \Yii::$app->formatter->asDatetime('now', 'yyyy-MM-dd HH:mm:ss'); // 2014-10-06
	}
}