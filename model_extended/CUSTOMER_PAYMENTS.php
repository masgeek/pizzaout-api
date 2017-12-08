<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 11/4/2017
 * Time: 2:24 PM
 */

namespace app\model_extended;


use app\models\Payment;

class CUSTOMER_PAYMENTS extends Payment
{

    public function rules()
    {
        $rules = parent::rules();

        $rules[] = [['PAYMENT_NUMBER'], 'required'];
        $rules[] = [['ORDER_ID'], 'required'];
        $rules[] = [['PAYMENT_STATUS'], 'required'];
        return $rules;
    }
}