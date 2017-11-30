<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_order".
 *
 * @property int $ORDER_ID
 * @property int $USER_ID
 * @property int $ADDRESS_ID
 * @property int $KITCHEN_ID
 * @property int $CHEF_ID
 * @property int $RIDER_ID
 * @property string $ORDER_DATE
 * @property string $PAYMENT_METHOD
 * @property string $ORDER_STATUS Status of the order
 * @property string $NOTES Can contain payment text from mobile transactions etc
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
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
            [['ORDER_ID', 'USER_ID', 'ADDRESS_ID', 'ORDER_DATE', 'PAYMENT_METHOD', 'ORDER_STATUS'], 'required'],
            [['ORDER_ID', 'USER_ID', 'ADDRESS_ID', 'KITCHEN_ID', 'CHEF_ID', 'RIDER_ID'], 'integer'],
            [['ORDER_DATE', 'CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['PAYMENT_METHOD'], 'string', 'max' => 20],
            [['ORDER_STATUS'], 'string', 'max' => 30],
            [['NOTES'], 'string', 'max' => 255],
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
            'ADDRESS_ID' => 'Address  ID',
            'KITCHEN_ID' => 'Kitchen  ID',
            'CHEF_ID' => 'Chef  ID',
            'RIDER_ID' => 'Rider  ID',
            'ORDER_DATE' => 'Order  Date',
            'PAYMENT_METHOD' => 'Payment  Method',
            'ORDER_STATUS' => 'Status of the order',
            'NOTES' => 'Can contain payment text from mobile transactions etc',
            'CREATED_AT' => 'Created  At',
            'UPDATED_AT' => 'Updated  At',
        ];
    }
}
