<?php
/**
 * Created by PhpStorm.
 * User: SAURON
 * Date: 4/16/2018
 * Time: 5:37 PM
 */

namespace app\model_extended;


use app\helpers\ORDER_HELPER;
use app\models\Chef;
use app\models\CustomerOrderItem;
use app\models\Kitchen;
use app\models\Location;
use app\models\Payment;
use app\models\Riders;
use app\models\Status;
use app\models\Users;
use app\models\VwSalesReports;

/**
 *
 * @property Users $uSER
 * @property Riders $rIDER
 * @property Kitchen $kITCHEN
 * @property Status $oRDERSTATUS
 * @property Chef $cHEF
 * @property Location $lOCATION
 * @property CustomerOrderItem[] $customerOrderItems
 * @property Payment[] $payments
 */
class ReportModel extends VwSalesReports
{
    public function attributeLabels()
    {
        //$labels = parent::attributeLabels();
        $labels = [
            'ORDER_ID' => 'Order  ID',
            'LOCATION_ID' => 'Location',
            'KITCHEN_ID' => 'Kitchen',
            'CHEF_ID' => 'Chef',
            'RIDER_ID' => 'Rider',
            'ORDER_DATE' => 'Order Date',
            'PAYMENT_METHOD' => 'Payment Method',
            'ORDER_STATUS' => 'Order Status',
            'ORDER_TIME' => 'Order Time',
            'NOTES' => 'Can contain payment text from mobile transactions etc',
            'CREATED_AT' => 'Created',
            'UPDATED_AT' => 'Updated',
            'USER_ID' => 'Customer',
            'USER_NAME' => 'Customer Username',
            'USER_TYPE' => 'User Type',
            'SURNAME' => 'Surname',
            'OTHER_NAMES' => 'Other Names',
            'LOCATION_NAME' => 'Location Name',
            'COUNTRY_ID' => 'Country ID',
            'CHEF_NAME' => 'Chef Name',
        ];

        return $labels;
    }

    /** Create relations here  **/
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(Users::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRIDER()
    {
        return $this->hasOne(Riders::className(), ['RIDER_ID' => 'RIDER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKITCHEN()
    {
        return $this->hasOne(Kitchen::className(), ['KITCHEN_ID' => 'KITCHEN_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getORDERSTATUS()
    {
        return $this->hasOne(Status::className(), ['STATUS_NAME' => 'ORDER_STATUS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCHEF()
    {
        return $this->hasOne(Chef::className(), ['CHEF_ID' => 'CHEF_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOCATION()
    {
        return $this->hasOne(Location::className(), ['LOCATION_ID' => 'LOCATION_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrderItems()
    {
        return $this->hasMany(CustomerOrderItem::className(), ['ORDER_ID' => 'ORDER_ID']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['ORDER_ID' => 'ORDER_ID']);
    }

    public static function getOrderStatuses()
    {
        /**
         * const STATUS_ORDER_CANCELLED = 'ORDER CANCELLED';
         * const STATUS_ORDER_PENDING = 'ORDER PENDING';
         * const STATUS_PAYMENT_CONFIRMED = 'ORDER CONFIRMED';
         * const STATUS_PAYMENT_PENDING = 'PAYMENT PENDING';
         * const STATUS_ORDER_CONFIRMED = 'ORDER CONFIRMED';
         * const STATUS_KITCHEN_ASSIGNED = 'KITCHEN ALLOCATED';
         * const STATUS_CHEF_ASSIGNED = 'CHEF ASSIGNED';
         * const STATUS_UNDER_PREPARATION = 'UNDER PREPARATION';
         * const STATUS_ORDER_READY = 'ORDER READY';
         * const STATUS_AWAITING_RIDER = 'AWAITING RIDER';
         * const STATUS_RIDER_ASSIGNED = 'RIDER ASSIGNED';
         * const STATUS_RIDER_DISPATCHED = 'RIDER DISPATCHED';
         * const STATUS_ORDER_DELIVERED = 'ORDER DELIVERED';
         */
        $status = [
            ORDER_HELPER::STATUS_ORDER_PENDING => 'Pending orders',
            ORDER_HELPER::STATUS_ORDER_CONFIRMED => 'Confirmed orders',
            ORDER_HELPER::STATUS_ORDER_CANCELLED => 'Cancelled orders',
            ORDER_HELPER::STATUS_PAYMENT_CONFIRMED => 'Paid Orders',
            //ORDER_HELPER::STATUS_PAYMENT_PENDING=> 'Unpaid Orders',
//            ORDER_HELPER::STATUS_KITCHEN_ASSIGNED => 'Kitchen Assigned',
//            ORDER_HELPER::STATUS_CHEF_ASSIGNED => 'Chef Assigned',
//            ORDER_HELPER::STATUS_UNDER_PREPARATION => 'Orders being prepared',
//            ORDER_HELPER::STATUS_ORDER_READY => 'Order Ready',
//            ORDER_HELPER::STATUS_AWAITING_RIDER => 'Awaiting Rider',
//            ORDER_HELPER::STATUS_RIDER_ASSIGNED => 'Rider Assigned',
//            ORDER_HELPER::STATUS_RIDER_DISPATCHED => 'Rider Dispatched',
//            ORDER_HELPER::STATUS_ORDER_DELIVERED => 'Order Delivered',
        ];

//        asort($status);
        return $status;
    }
}