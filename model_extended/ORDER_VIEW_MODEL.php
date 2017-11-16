<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 11/9/2017
 * Time: 5:00 PM
 */

namespace app\model_extended;


use app\models\Chef;
use app\models\CustomerAddress;
use app\models\CustomerOrderItem;
use app\models\Kitchen;
use app\models\OrderTracking;
use app\models\Payment;
use app\models\Riders;
use app\models\Status;
use app\models\Users;
use app\models\VwOrders;

/**
 * This is the model class for table "customer_order".
 *
 * @property string $ORDER_ID
 * @property string $USER_ID
 * @property string $ADDRESS_ID
 * @property string $KITCHEN_ID
 * @property string $CHEF_ID
 * @property string $RIDER_ID
 * @property string $ORDER_DATE
 * @property string $PAYMENT_METHOD
 * @property string $ORDER_STATUS Status of the order
 * @property string $NOTES Can contain payment text from mobile transactions etc
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 *
 * @property Users $uSER
 * @property CustomerAddress $aDDRESS
 * @property Riders $rIDER
 * @property Kitchen $kITCHEN
 * @property Status $oRDERSTATUS
 * @property Chef $cHEF
 * @property CustomerOrderItem[] $customerOrderItems
 * @property OrderTracking[] $orderTrackings
 * @property Status[] $statuses
 * @property Payment[] $payments
 */
class ORDER_VIEW_MODEL extends VwOrders
{
    public $START_DATE;
    public $END_DATE;

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['ADDRESS_ID'] = 'Delivery Address';
        $labels['KITCHEN_ID'] = 'Assign Kitchen';
        $labels['CHEF_ID'] = 'Assign Chef';
        $labels['RIDER_ID'] = 'Assign Rider';
        $labels['NOTES'] = 'Notes';
        $labels['ORDER_PRICE'] = 'Total';
        $labels['PAYMENT_METHOD'] = 'Payment';
        $labels['ORDER_STATUS'] = 'Status';
        $labels['ORDER_ID'] = 'Order ID #';

        return $labels;
    }

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
    public function getADDRESS()
    {
        return $this->hasOne(CustomerAddress::className(), ['ADDRESS_ID' => 'ADDRESS_ID']);
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
    public function getCustomerOrderItems()
    {
        return $this->hasMany(CustomerOrderItem::className(), ['ORDER_ID' => 'ORDER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderTrackings()
    {
        return $this->hasMany(OrderTracking::className(), ['ORDER_ID' => 'ORDER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatuses()
    {
        return $this->hasMany(Status::className(), ['STATUS_NAME' => 'STATUS'])->viaTable('order_tracking', ['ORDER_ID' => 'ORDER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['ORDER_ID' => 'ORDER_ID']);
    }
}