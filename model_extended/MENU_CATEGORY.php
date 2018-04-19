<?php
/**
 * Created by PhpStorm.
 * User: masgeek
 * Date: 21-Dec-17
 * Time: 09:51
 */

namespace app\model_extended;


use app\models\MenuCategory;
use yii\helpers\ArrayHelper;

class MENU_CATEGORY extends MenuCategory
{
    public $IMAGE_FILE;

    public static function GetMenuCategories($textSearch = false)
    {

        $chefs = self::find()
            //->where(['KITCHEN_ID' => $kitchen_id])
            ->where(['ACTIVE' => 1])
            ->all();


        $listData = $textSearch ? ArrayHelper::map($chefs, 'MENU_CAT_NAME', 'MENU_CAT_NAME') : ArrayHelper::map($chefs, 'MENU_CAT_ID', 'MENU_CAT_NAME');

        return $listData;
    }
}