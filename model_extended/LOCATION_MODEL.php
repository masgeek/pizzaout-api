<?php
/**
 * Created by PhpStorm.
 * User: masgeek
 * Date: 17-Jan-18
 * Time: 12:47
 */

namespace app\model_extended;


use app\models\Location;
use yii\helpers\ArrayHelper;

class LOCATION_MODEL extends Location
{
    public static function GetLocation()
    {
        $location = self::find()
            ->all();

        $listData = ArrayHelper::map($location, 'LOCATION_ID', 'LOCATION_NAME');

        return $listData;
    }
}