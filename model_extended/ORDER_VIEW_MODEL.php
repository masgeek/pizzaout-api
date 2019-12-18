<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 11/9/2017
 * Time: 5:00 PM
 */

namespace app\model_extended;


use app\api\modules\v1\models\LOCATION_MODEL;
use app\models\Chef;
use app\models\CustomerAddress;
use app\models\CustomerOrderItem;
use app\models\Kitchen;
use app\models\Location;
use app\models\OrderTracking;
use app\models\Payment;
use app\models\Riders;
use app\models\Status;
use app\models\Users;
use app\models\VwOrders;

class ORDER_VIEW_MODEL extends \app\models\base\VwOrders
{
    public $START_DATE;
    public $END_DATE;

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['LOCATION_ID'] = 'Delivery Address';
        $labels['KITCHEN_ID'] = 'Assign Kitchen';
        $labels['CHEF_ID'] = 'Assign Chef';
        $labels['RIDER_ID'] = 'Assign Rider';
        $labels['NOTES'] = 'Notes';
        $labels['ORDER_PRICE'] = 'Total';
        $labels['PAYMENT_METHOD'] = 'Payment';
        $labels['ORDER_STATUS'] = 'Status';
        $labels['ORDER_TIME'] = 'Delivery Time';
        $labels['ORDER_ID'] = 'Order Number';


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
    public function getORDERSTATUS()
    {
        return $this->hasOne(Status::className(), ['STATUS_NAME' => 'ORDER_STATUS']);
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