<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 10-Nov-17
 * Time: 10:49
 */

namespace app\model_extended;


use app\helpers\APP_UTILS;
use app\models\Cart;

class CART_MODEL extends Cart
{
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->CREATED_AT = APP_UTILS::GetCurrentDateTime();
            }
            $this->UPDATED_AT = APP_UTILS::GetCurrentDateTime();
            return true;
        }
        return false;
    }
}