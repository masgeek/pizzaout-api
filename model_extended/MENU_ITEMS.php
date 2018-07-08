<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 10-Nov-17
 * Time: 11:28
 */

namespace app\model_extended;


use app\models\MenuItem;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use Yii;

class MENU_ITEMS extends MenuItem
{
    public $IMAGE_FILE;

    /**
     * @param null $menu_cat_id
     * @param bool $textSearch
     * @return array
     */
    public static function GetMenuItems($menu_cat_id = null, $textSearch = false)
    {

        $MENU_ITEMS = self::find()
            //->where(['MENU_CAT_ID' => $menu_cat_id])
            ->all();

        $listData = $textSearch ? ArrayHelper::map($MENU_ITEMS, 'MENU_ITEM_NAME', 'MENU_ITEM_NAME') : ArrayHelper::map($MENU_ITEMS, 'MENU_ITEM_ID', 'MENU_ITEM_NAME');

        return $listData;
    }

    /**
     * @return ActiveDataProvider
     */
    public static function GetPizzaList()
    {
        return self::GetMenuList(1);
    }

    /**
     * @return ActiveDataProvider
     */
    public static function GetDrinksList()
    {
        return self::GetMenuList(6);
    }

    /**
     * @param $menu_item_id
     * @return ActiveDataProvider
     */
    private static function GetMenuList($menu_item_id)
    {
        return new ActiveDataProvider([
            'query' => MENU_ITEMS::find()
                ->where(['MENU_CAT_ID' => $menu_item_id])
                ->orderBy(['MENU_ITEM_NAME' => SORT_ASC]),
        ]);
    }

    /**
     * @return array
     */
    public static function GetItemSizes()
    {

        $sizes = SIZES_MODEL::find()
            //->where(['MENU_CAT_ID' => $menu_cat_id])
            ->all();
        return ArrayHelper::map($sizes, 'SIZE_TYPE', 'SIZE_TYPE');
    }

    /**
     * @inheritdoc
     */
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
}