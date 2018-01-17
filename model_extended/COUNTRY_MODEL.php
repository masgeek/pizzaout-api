<?php
/**
 * Created by PhpStorm.
 * User: masgeek
 * Date: 17-Jan-18
 * Time: 12:51
 */

namespace app\model_extended;


use app\models\Country;
use yii\helpers\ArrayHelper;

class COUNTRY_MODEL extends Country
{
    public static function GetCountry()
    {
        $country = self::find()
            ->all();

        $listData = ArrayHelper::map($country, 'COUNRY_ID', 'COUNTRY_NAME');

        return $listData;
    }
}