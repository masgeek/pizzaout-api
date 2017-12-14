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
        $riders = self::find()
            ->with('uSER')
            ->where(['KITCHEN_ID' => $kitchen_id])
            ->andWhere(['RIDER_STATUS' => 1])
            ->all();

        $riders_arr = [];
        foreach ($riders as $key => $rider) {
            $riders_arr[$rider->RIDER_ID] = "{$rider->uSER->SURNAME}, {$rider->uSER->OTHER_NAMES}";
        }

        return $riders_arr;
    }
}