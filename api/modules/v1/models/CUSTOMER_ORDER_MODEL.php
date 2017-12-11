<?php
/**
 * Created by PhpStorm.
 * User: barsa
 * Date: 09-Oct-17
 * Time: 15:13
 */

namespace app\api\modules\v1\models;


use app\model_extended\CUSTOMER_ORDERS;
use yii\helpers\Url;
use yii\web\Link;
use yii\web\Linkable;

/**
 *
 * @property PAYMENT_MODEL $payment
 * @property array $links
 */
class CUSTOMER_ORDER_MODEL extends CUSTOMER_ORDERS implements Linkable
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
            return $model->rIDER;
        };

        $fields['ADDRESS'] = function ($model) {
            /* @var $model $this */
            return $model->aDDRESS;
        };
        $fields['PAYMENT'] = function ($model) {
            /* @var $model $this */
            return $model->payment;
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

    public function getLinks()
    {
        return [];
        return [
            Link::REL_SELF => Url::to(['user/view', 'id' => $this->ORDER_ID], true),
            'edit' => Url::to(['user/view', 'id' => $this->ORDER_ID], true),
            'profile' => Url::to(['user/profile/view', 'id' => $this->ORDER_ID], true),
            'index' => Url::to(['users'], true),
        ];
    }
}