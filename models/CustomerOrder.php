<?php

namespace app\models;

use app\api\modules\v1\models\PAYMENT_MODEL;
use app\helpers\APP_UTILS;
use app\model_extended\CUSTOMER_ORDERS;
use app\model_extended\STATUS_TRACKING_MODEL;
use Yii;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveQuery;

class CustomerOrder extends base\CustomerOrder
{
    public $COMMENTS;
    public $ALERT_USER = true;
    public $PAYMENT_NUMBER;
    public $AMOUNT_RECEIVED;
    public $TOTAL_SALES;
    public $CHANGE_DUE;

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'ORDERED_BY',
                'updatedByAttribute' => 'UPDATED_BY',
            ],
        ];
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['ADDRESS_ID'] = 'Delivery Address';
        $labels['USER_ID'] = 'Customer';
        $labels['LOCATION_ID'] = 'Delivery Location';
        $labels['KITCHEN_ID'] = 'Assign Kitchen';
        $labels['CHEF_ID'] = 'Assign Chef';
        $labels['RIDER_ID'] = 'Assign Rider';
        $labels['NOTES'] = 'Notes';
        $labels['ORDER_PRICE'] = 'Total';
        $labels['PAYMENT_METHOD'] = 'Payment';
        $labels['ORDER_STATUS'] = 'Status';
        $labels['ALERT_USER'] = 'Notify Customer';
        $labels['ORDER_ID'] = 'Order ID #';
        $labels['PAYMENT_NUMBER'] = 'Order Payment Number';
        $labels['ORDER_TIME'] = 'Delivery Time';

        return $labels;
    }

    /**
     * @param bool $insert
     * @return bool
     * @throws \PHPMailer\PHPMailer\Exception
     * @throws Exception
     */
    public function beforeSave($insert)
    {
        $date = APP_UTILS::GetCurrentDateTime();
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->CREATED_AT = $date;
            } else {
                //trigger email sending on every action
                //APP_UTILS::SendOrderEmailWithReceipt($this->uSER, $this->ORDER_ID, $this->oRDERSTATUS->STATUS_NAME);
                //APP_UTILS::SendSMS($this->uSER, $this->ORDER_ID, $this->oRDERSTATUS->STATUS_NAME);
            }
            $this->UPDATED_AT = $date;


            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        //lets add to tracking table
        $tracker = new STATUS_TRACKING_MODEL();
        $tracker->ORDER_ID = $this->ORDER_ID;
        $tracker->STATUS = $this->ORDER_STATUS;
        $tracker->COMMENTS = $this->COMMENTS;
        $tracker->TRACKING_DATE = APP_UTILS::GetCurrentDateTime();
        $tracker->USER_VISIBLE = $this->ALERT_USER;
        $tracker->save();
    }


    /**
     * @param bool $formatted
     * @return float|int|string
     * @throws InvalidConfigException
     */
    public function ComputeOrderTotal($formatted = false)
    {
        /* @var $model CUSTOMER_ORDERS */
        $data = $this->customerOrderItems;
        $total = 0;
        foreach ($data as $key => $value) {
            $total = $total + (float)($value->SUBTOTAL);
        }
        return $formatted ? Yii::$app->formatter->asCurrency($total) : $total;
    }

    /**
     * @return ActiveQuery
     */
    public function getOrderTrackings()
    {
        return $this->hasMany(OrderTracking::className(), ['ORDER_ID' => 'ORDER_ID'])->orderBy(['TRACKING_DATE' => SORT_DESC]);
    }


    /**
     * @return ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(PAYMENT_MODEL::className(), ['ORDER_ID' => 'ORDER_ID']);
    }

    /**
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getStatuses()
    {
        return $this->hasMany(Status::className(), ['STATUS_NAME' => 'STATUS'])->viaTable('order_tracking', ['ORDER_ID' => 'ORDER_ID']);
    }

    /**
     * @return ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['ORDER_ID' => 'ORDER_ID']);
    }
}
