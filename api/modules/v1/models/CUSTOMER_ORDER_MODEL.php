<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 09-Oct-17
 * Time: 15:13
 */

namespace app\api\modules\v1\models;


use app\model_extended\CUSTOMER_ORDERS;

/**
 *
 * @property PAYMENT_MODEL $payment
 */
class CUSTOMER_ORDER_MODEL extends CUSTOMER_ORDERS
{


    public function fields()
    {
        $fields = parent::fields();

        $fields['RIDER_ID'] = function ($model) {
            /* @var $model $this */
            return $model->rIDER != null ? $model->RIDER_ID : 0;
        };
        $fields['CHEF_ID'] = function ($model) {
            /* @var $model $this */
            return $model->cHEF != null ? $model->CHEF_ID : 0;
        };

        $fields['KITCHEN_ID'] = function ($model) {
            /* @var $model $this */
            return $model->kITCHEN != null ? $model->KITCHEN_ID : 0;
        };

        $fields['RIDER'] = function ($model) {
            /* @var $model $this */
            return $model->rIDER != null ? $model->rIDER : 'NONE';
        };

        $fields['ADDRESS'] = function ($model) {
            /* @var $model $this */
            return $model->aDDRESS != null ? $model->aDDRESS : 'NONE';
        };
        $fields['PAYMENT'] = function ($model) {
            /* @var $model $this */
            return $model->payment != null ? $model->payment : 'NONE';
        };

        $fields['ORDER_DETAILS'] = function ($model) {
            /* @var $model $this */
            $data = CUSTOMER_ORDER_ITEM::GetItemTypes($model->ORDER_ID);
            return $data;
        };


        ksort($fields);
        return $fields;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(PAYMENT_MODEL::className(), ['ORDER_ID' => 'ORDER_ID']);
    }
}