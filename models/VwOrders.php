<?php

namespace app\models;

/**
 * This is the model class for table "vw_orders".
 *
 * @property string $ORDER_ID
 * @property string $USER_ID
 * @property string $EMAIL
 * @property int $MOBILE
 * @property string $OTHER_NAMES
 * @property string $SURNAME
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
 * @property string $PAYMENT_NUMBER
 * @property string $PAYMENT_AMOUNT
 */
class VwOrders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vw_orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'USER_ID', 'MOBILE', 'ADDRESS_ID', 'KITCHEN_ID', 'CHEF_ID', 'RIDER_ID'], 'integer'],
            [['USER_ID', 'EMAIL', 'MOBILE', 'OTHER_NAMES', 'SURNAME', 'ADDRESS_ID', 'ORDER_DATE', 'PAYMENT_METHOD', 'ORDER_STATUS', 'PAYMENT_AMOUNT'], 'required'],
            [['ORDER_DATE', 'CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['PAYMENT_AMOUNT'], 'number'],
            [['EMAIL', 'OTHER_NAMES', 'SURNAME'], 'string', 'max' => 100],
            [['PAYMENT_METHOD'], 'string', 'max' => 20],
            [['ORDER_STATUS', 'PAYMENT_NUMBER'], 'string', 'max' => 30],
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
            'EMAIL' => 'Email',
            'MOBILE' => 'Mobile',
            'OTHER_NAMES' => 'Other  Names',
            'SURNAME' => 'Surname',
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
            'PAYMENT_NUMBER' => 'Payment  Number',
            'PAYMENT_AMOUNT' => 'Payment  Amount',
        ];
    }
}
