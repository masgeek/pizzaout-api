<?php
/**
 * Created by PhpStorm.
 * User: masgeek
 * Date: 27-Nov-17
 * Time: 12:56
 */

namespace app\api\modules\v1\models;


use app\helpers\APP_UTILS;
use app\models\Cart;

class CART_MODEL extends Cart
{

    /**
     * @param bool $insert
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->CREATED_AT = APP_UTILS::GetCurrentDateTime();
            }
            $this->UPDATED_AT = APP_UTILS::GetCurrentDateTime();
            $this->CART_TIMESTAMP = APP_UTILS::GetCartTimesTamp($this->USER_ID);
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    public function fields()
    {
        $fields = parent::fields();

        $fields['ITEM_PRICE'] = function ($model) {
            return (float)$model->ITEM_PRICE;
        };

        $fields['SIZE'] = function ($model) {
            /* @var $model CART_MODEL */
            return $model->ITEM_TYPE_SIZE;
        };

        $fields['SIZES'] = function ($model) {
            /* @var $model CART_MODEL */
            return $model->iTEMTYPE->mENUITEM->menuItemTypes;
        };
        $fields['MENU_CAT_ITEM'] = function ($model) {
            /* @var $model CART_MODEL */
            $menu_item = $model->iTEMTYPE->mENUITEM;

            $menu_item->MENU_ITEM_IMAGE = APP_UTILS::BuildImageUrl($menu_item->MENU_ITEM_IMAGE);
            return $menu_item;
        };
        return $fields;
    }
}