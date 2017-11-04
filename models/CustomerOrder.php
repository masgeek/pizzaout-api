<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_order".
 *
 * @property string $ORDER_ID
 * @property string $USER_ID
 * @property string $LOCATION_ID
 * @property string $KITCHEN_ID
 * @property string $CHEF_ID
 * @property string $RIDER_ID
 * @property int $ORDER_QUANTITY
 * @property string $ORDER_DATE
 * @property string $ORDER_PRICE
 * @property string $PAYMENT_METHOD
 * @property string $ORDER_STATUS Status of the order
 * @property string $NOTES Can contain payment text from mobile transactions etc
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 *
 * @property Users $uSER
 * @property Location $lOCATION
 * @property Riders $rIDER
 * @property Kitchen $kITCHEN
 * @property Status $oRDERSTATUS
 * @property Chef $cHEF
 * @property CustomerOrderItem[] $customerOrderItems
 * @property OrderTracking[] $orderTrackings
 * @property Payment[] $payments
 */
class CustomerOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'LOCATION_ID', 'ORDER_QUANTITY', 'ORDER_DATE', 'ORDER_PRICE', 'PAYMENT_METHOD', 'ORDER_STATUS'], 'required'],
            [['USER_ID', 'LOCATION_ID', 'KITCHEN_ID', 'CHEF_ID', 'RIDER_ID', 'ORDER_QUANTITY'], 'integer'],
            [['ORDER_DATE', 'CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['ORDER_PRICE'], 'number'],
            [['PAYMENT_METHOD'], 'string', 'max' => 20],
            [['ORDER_STATUS'], 'string', 'max' => 30],
            [['NOTES'], 'string', 'max' => 255],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
            [['LOCATION_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['LOCATION_ID' => 'LOCATION_ID']],
            [['RIDER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Riders::className(), 'targetAttribute' => ['RIDER_ID' => 'RIDER_ID']],
            [['KITCHEN_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Kitchen::className(), 'targetAttribute' => ['KITCHEN_ID' => 'KITCHEN_ID']],
            [['ORDER_STATUS'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['ORDER_STATUS' => 'STATUS_NAME']],
            [['CHEF_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Chef::className(), 'targetAttribute' => ['CHEF_ID' => 'CHEF_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ORDER_ID' => 'Order  ID',
            'USER_ID' => 'User  ID',
            'LOCATION_ID' => 'Location  ID',
            'KITCHEN_ID' => 'Kitchen  ID',
            'CHEF_ID' => 'Chef  ID',
            'RIDER_ID' => 'Rider  ID',
            'ORDER_QUANTITY' => 'Order  Quantity',
            'ORDER_DATE' => 'Order  Date',
            'ORDER_PRICE' => 'Order  Price',
            'PAYMENT_METHOD' => 'Payment  Method',
            'ORDER_STATUS' => 'Status of the order',
            'NOTES' => 'Can contain payment text from mobile transactions etc',
            'CREATED_AT' => 'Created  At',
            'UPDATED_AT' => 'Updated  At',
        ];
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
    public function getLOCATION()
    {
        return $this->hasOne(Location::className(), ['LOCATION_ID' => 'LOCATION_ID']);
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
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['ORDER_ID' => 'ORDER_ID']);
    }
}
