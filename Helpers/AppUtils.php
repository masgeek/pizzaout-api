<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 3:30 PM
 */

namespace app\Helpers;


class AppUtils
{
	const KITCHEN_SCOPE = 'KITCHEN';
	const RIDER_SCOPE = 'RIDER';
	const OFFICE_SCOPE = 'OFFICE';
	const ALL_SCOPE = 'ALL';


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
	public static function GetCurrentTime()
	{
		return \Yii::$app->formatter->asDatetime('now', 'yyyy-MM-dd HH:mm:ss'); // 2014-10-06
	}
}