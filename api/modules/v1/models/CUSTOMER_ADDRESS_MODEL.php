<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 12/11/2017
 * Time: 11:50 AM
 */

namespace app\api\modules\v1\models;


use app\models\CustomerAddress;

class CUSTOMER_ADDRESS_MODEL extends CustomerAddress
{
    public function fields()
    {
        $fields = parent::fields();

        $fields['USER'] = function ($model) {
            /* @var $model CUSTOMER_ADDRESS_MODEL */
            return $model->uSER->USER_NAME;
        };
        $fields['LOCATION'] = function ($model) {
            /* @var $model CUSTOMER_ADDRESS_MODEL */
            return $model->lOCATION;
        };
        return $fields;
    }
}