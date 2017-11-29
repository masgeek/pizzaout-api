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

        $fields['SIZE'] = function ($model) {
            /* @var $model CART_MODEL */
            return $model->iTEMTYPE->ITEM_TYPE_SIZE;
        };

        $fields['MENU_CAT_ITEM'] = function ($model) {
            /* @var $model CART_MODEL */
            return $model->iTEMTYPE->mENUITEM;
        };
        return $fields;
    }
}