<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $ORDER_ID
 * @property int $USER_ID
 * @property int $LOCATION_ID
 * @property int $ORDER_QUANTITY
 * @property string $ORDER_DATE
 * @property string $ORDER_PRICE
 * @property string $PAYMENT_METHOD
 * @property string $ORDER_STATUS
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 *
 * @property Users $uSER
 * @property Location $lOCATION
 * @property OrderItem[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'LOCATION_ID', 'ORDER_QUANTITY', 'ORDER_DATE', 'ORDER_PRICE', 'PAYMENT_METHOD', 'ORDER_STATUS'], 'required'],
            [['USER_ID', 'LOCATION_ID', 'ORDER_QUANTITY'], 'integer'],
            [['ORDER_DATE', 'CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['ORDER_PRICE'], 'number'],
            [['PAYMENT_METHOD'], 'string', 'max' => 20],
            [['ORDER_STATUS'], 'string', 'max' => 255],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
            [['LOCATION_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['LOCATION_ID' => 'LOCATION_ID']],
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
            'ORDER_QUANTITY' => 'Order  Quantity',
            'ORDER_DATE' => 'Order  Date',
            'ORDER_PRICE' => 'Order  Price',
            'PAYMENT_METHOD' => 'Payment  Method',
            'ORDER_STATUS' => 'Order  Status',
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
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::className(), ['ORDER_ID' => 'ORDER_ID']);
    }
}
