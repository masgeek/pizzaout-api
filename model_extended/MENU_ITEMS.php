<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 10-Nov-17
 * Time: 11:28
 */

namespace app\model_extended;


use app\models\MenuItem;
use yii\helpers\ArrayHelper;

class MENU_ITEMS extends MenuItem
{
    public static function GetMenuItems($menu_cat_id)
    {

        $chefs = self::find()
            //->where(['MENU_CAT_ID' => $menu_cat_id])
            ->all();

        $listData = ArrayHelper::map($chefs, 'MENU_ITEM_ID', 'MENU_ITEM_NAME');

        return $listData;
    }

    public static function GetItemSizes()
    {

        return [
            'SMALL' => 'SMALL',
            'MEDIUM' => 'MEDIUM',
            'LARGE' => 'LARGE',
        ];
        /* $chefs = self::find()
             //->where(['MENU_CAT_ID' => $menu_cat_id])
             ->all();

         $listData = ArrayHelper::map($chefs, 'MENU_ITEM_ID', 'MENU_ITEM_NAME');

         return $listData;*/
    }
}