<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 09-Oct-17
 * Time: 15:20
 */

namespace app\api\modules\v1\models;


use app\models\MenuItem;

class MENU_ITEM_MODEL extends MenuItem
{

    public function fields()
    {
        $fields = parent::fields();

        $fields['CAT_NAME'] = function ($model) {
            /* @var $model MENU_ITEM_MODEL */

            return $model->mENUCAT->MENU_CAT_NAME;
        };
        return $fields;
    }
}