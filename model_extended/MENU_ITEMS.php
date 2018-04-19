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
use Yii;

class MENU_ITEMS extends MenuItem
{
    public $IMAGE_FILE;

    public static function GetMenuItems($menu_cat_id = null)
    {

        $chefs = self::find()
            //->where(['MENU_CAT_ID' => $menu_cat_id])
            ->all();

        $listData = ArrayHelper::map($chefs, 'MENU_ITEM_ID', 'MENU_ITEM_NAME');

        return $listData;
    }

    public static function GetItemSizes()
    {

        $sizes = SIZES_MODEL::find()
            //->where(['MENU_CAT_ID' => $menu_cat_id])
            ->all();
        return ArrayHelper::map($sizes, 'SIZE_TYPE', 'SIZE_TYPE');
    }

    public function attributeLabels()
    {
        return [
            'MENU_ITEM_ID' => Yii::t('app', 'Menu Item'),
            'MENU_CAT_ID' => Yii::t('app', 'Menu Category'),
            'MENU_ITEM_NAME' => Yii::t('app', 'Menu Item Name'),
            'MENU_ITEM_DESC' => Yii::t('app', 'Description'),
            'MENU_ITEM_IMAGE' => Yii::t('app', 'Image'),
            'HOT_DEAL' => Yii::t('app', 'Hot Deal'),
            'VEGETARIAN' => Yii::t('app', 'Vegetarian'),
            'MAX_QTY' => Yii::t('app', 'Max Item Per Customer'),
        ];
    }

    /*
    public function attributeLabels()
    {
        $label =  parent::attributeLabels();
        $label['MAX_QTY'] = 'Max Item Per Customer';
        $label['MAX_QTY'] = 'Max Item Per Customer';
        return $label;
    }*/
}