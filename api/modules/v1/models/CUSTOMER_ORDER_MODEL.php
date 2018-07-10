<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 09-Oct-17
 * Time: 15:13
 */

namespace app\api\modules\v1\models;


use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
use app\model_extended\CUSTOMER_ORDERS;
use Symfony\Component\Console\Helper\Helper;

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

        $fields['USSD_NUMBER'] = function ($model) {
            /* @var $model $this */
            return \Yii::$app->params['ussdNumber'];
        };

        $fields['PAY_ORDER'] = function ($model) {
            /* @var $model $this */
            return $model->ORDER_STATUS ===ORDER_HELPER::STATUS_PAYMENT_PENDING ? true : false;
        };
        ksort($fields);


        $fields['ADDRESS'] = function ($model) {
            /* @var $model $this */
            return 'NONE';
        };


        $fields['ORDER_TIME'] = function ($model) {
            /* @var $model $this */
            return APP_UTILS::FormatDateTime($model->ORDER_TIME,true,'H:i');
        };

        $fields['ORDER_DATE_TIME'] = function ($model) {
            /* @var $model $this */
            return APP_UTILS::FormatDateTime($model->ORDER_TIME,true,'Y-m-d H:i:s');
        };

        $fields['LOCATION'] = function ($model) {
            /* @var $model $this */
            return $model->lOCATION != null ? $model->lOCATION : 'NONE';
        };

        $fields['PAYMENT'] = function ($model) {
            /* @var $model $this */
            return $model->payment != null ? $model->payment : 'NONE';
        };
        $fields['ORDER_TIMELINE'] = function ($model) {
            /* @var $model $this */
            //$data = CUSTOMER_ORDER_ITEM::GetItemTypes($model->ORDER_ID);
            //return $data;
            return $this->orderTrackings != null ? $this->orderTrackings : 'NONE';
        };

        $fields['ORDER_DETAILS'] = function ($model) {
            /* @var $model $this */
            $data = CUSTOMER_ORDER_ITEM::GetItemTypes($model->ORDER_ID);
            return $data;
        };

        $fields['ORDER_TOTAL'] = function ($model) {
            /* @var $model CUSTOMER_ORDER_MODEL */
            return $model->ComputeOrderTotal();
        };


        return $fields;
    }

}