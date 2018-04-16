<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 2:17 PM
 */

namespace app\model_extended;


use app\models\Chef;
use yii\helpers\ArrayHelper;

class CHEF_MODEL extends Chef
{
    public static function GetChefs($kitchen_id, $asModel = false)
    {
        $chefs = self::find()
            ->where(['KITCHEN_ID' => $kitchen_id])
            ->all();

        $listData = ArrayHelper::map($chefs, 'CHEF_ID', 'CHEF_NAME');

        return $asModel ? $chefs : $listData;
    }

    public static function GetAllChefs()
    {
        $kitchen = self::find()
            ->all();
        $listData = ArrayHelper::map($kitchen, 'CHEF_ID', 'CHEF_NAME');

        return $listData;
    }
    /**
     * @return int|string
     */
    public static function GetChefCount()
    {
        $chefs = self::find()->count();


        return $chefs < 8 ? 8 : $chefs;
    }
}