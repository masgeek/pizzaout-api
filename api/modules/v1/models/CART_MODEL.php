<?php
/**
 * Created by PhpStorm.
 * User: masgeek
 * Date: 27-Nov-17
 * Time: 12:56
 */

namespace app\api\modules\v1\models;


use app\models\Cart;

class CART_MODEL extends Cart
{

    public function fields()
    {
        $fields = parent::fields();

        $fields['ITEM_TYPE'] = function ($model) {
            /* @var $model $this */
            return $model->iTEMTYPE;
        };
        return $fields;
    }
}