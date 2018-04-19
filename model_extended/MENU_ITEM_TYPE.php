<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 10-Nov-17
 * Time: 11:47
 */

namespace app\model_extended;


use app\models\MenuItemType;
use yii\helpers\ArrayHelper;

class MENU_ITEM_TYPE extends MenuItemType
{

    public function rules()
    {
        $rules = parent::rules();

        $rules[] = [['AVAILABLE'], 'boolean'];

        return $rules;
    }

    public static function getMenuItems(){
        $menuItem = self::find()->all();

        $listData = ArrayHelper::map($menuItem, 'ITEM_TYPE_SIZE', 'ITEM_TYPE_SIZE');

        return $listData;
    }
}