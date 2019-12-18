<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "customer_order".
 *
 * @property int $ORDER_ID
 * @property int $USER_ID
 * @property int $LOCATION_ID
 * @property int $KITCHEN_ID
 * @property int $CHEF_ID
 * @property int $RIDER_ID
 * @property string $ORDER_DATE
 * @property string $PAYMENT_METHOD
 * @property string $ORDER_STATUS Status of the order
 * @property string $ORDER_TIME
 * @property string $NOTES Can contain payment text from mobile transactions etc
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 * @property string $TABLE_NUMBER
 * @property int $ORDERED_BY
 * @property int $UPDATED_BY
 *
 * @property Users $uSER
 * @property Riders $rIDER
 * @property Kitchen $kITCHEN
 * @property Status $oRDERSTATUS
 * @property Chef $cHEF
 * @property Location $lOCATION
 * @property CustomerOrderItem[] $customerOrderItems
 * @property OrderTracking[] $orderTrackings
 * @property Status[] $statuses
 * @property Payment[] $payments
 */
class CustomerOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USER_ID', 'ORDER_DATE', 'PAYMENT_METHOD', 'ORDER_STATUS', 'TABLE_NUMBER'], 'required'],
            [['USER_ID', 'LOCATION_ID', 'KITCHEN_ID', 'CHEF_ID', 'RIDER_ID', 'ORDERED_BY', 'UPDATED_BY'], 'integer'],
            [['ORDER_DATE', 'CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['PAYMENT_METHOD', 'ORDER_TIME'], 'string', 'max' => 20],
            [['ORDER_STATUS'], 'string', 'max' => 30],
            [['NOTES'], 'string', 'max' => 255],
            [['TABLE_NUMBER'], 'string', 'max' => 15],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
            [['RIDER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Riders::className(), 'targetAttribute' => ['RIDER_ID' => 'RIDER_ID']],
            [['KITCHEN_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Kitchen::className(), 'targetAttribute' => ['KITCHEN_ID' => 'KITCHEN_ID']],
            [['ORDER_STATUS'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['ORDER_STATUS' => 'STATUS_NAME']],
            [['CHEF_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Chef::className(), 'targetAttribute' => ['CHEF_ID' => 'CHEF_ID']],
            [['LOCATION_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['LOCATION_ID' => 'LOCATION_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ORDER_ID' => Yii::t('app', 'Order ID'),
            'USER_ID' => Yii::t('app', 'User ID'),
            'LOCATION_ID' => Yii::t('app', 'Location ID'),
            'KITCHEN_ID' => Yii::t('app', 'Kitchen ID'),
            'CHEF_ID' => Yii::t('app', 'Chef ID'),
            'RIDER_ID' => Yii::t('app', 'Rider ID'),
            'ORDER_DATE' => Yii::t('app', 'Order Date'),
            'PAYMENT_METHOD' => Yii::t('app', 'Payment Method'),
            'ORDER_STATUS' => Yii::t('app', 'Status of the order'),
            'ORDER_TIME' => Yii::t('app', 'Order Time'),
            'NOTES' => Yii::t('app', 'Can contain payment text from mobile transactions etc'),
            'CREATED_AT' => Yii::t('app', 'Created At'),
            'UPDATED_AT' => Yii::t('app', 'Updated At'),
            'TABLE_NUMBER' => Yii::t('app', 'Table Number'),
            'ORDERED_BY' => Yii::t('app', 'Ordered By'),
            'UPDATED_BY' => Yii::t('app', 'Updated By'),
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
