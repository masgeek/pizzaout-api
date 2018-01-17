<?php
/**
 * Created by PhpStorm.
 * User: masgeek
 * Date: 17-Jan-18
 * Time: 12:48
 */

namespace app\model_extended;


use app\models\City;
use yii\helpers\ArrayHelper;

class CITY_MODEL extends City
{
    public static function GetCity()
    {
        $country = self::find()
            ->all();

        $listData = ArrayHelper::map($country, 'CITY_ID', 'CITY_NAME');

        return $listData;
    }
}