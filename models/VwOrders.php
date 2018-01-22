<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vw_orders".
 *
 * @property string $ORDER_ID
 * @property string $USER_ID
 * @property string $KITCHEN_ID
 * @property string $CHEF_ID
 * @property string $RIDER_ID
 * @property string $MOBILE
 * @property string $SURNAME
 * @property string $OTHER_NAMES
 * @property string $ORDER_DATE
 * @property string $ORDER_STATUS Status of the order
 * @property string $PAYMENT_AMOUNT
 * @property string $PAYMENT_NUMBER
 * @property string $NOTES Can contain payment text from mobile transactions etc
 * @property string $PAYMENT_METHOD
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 * @property string $PAYMENT_DATE
 * @property string $LOCATION_ID
 * @property string $LOCATION_NAME
 * @property string $ADDRESS
 * @property string $CITY_NAME
 * @property string $CITY_ID
 * @property string $COUNRY_ID
 * @property string $COUNTRY_NAME
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
            [['ORDER_ID', 'USER_ID', 'KITCHEN_ID', 'CHEF_ID', 'RIDER_ID', 'LOCATION_ID', 'CITY_ID', 'COUNRY_ID'], 'integer'],
            [['USER_ID', 'MOBILE', 'SURNAME', 'OTHER_NAMES', 'ORDER_DATE', 'ORDER_STATUS', 'PAYMENT_METHOD', 'LOCATION_NAME', 'CITY_NAME', 'COUNTRY_NAME'], 'required'],
            [['ORDER_DATE', 'CREATED_AT', 'UPDATED_AT', 'PAYMENT_DATE'], 'safe'],
            [['PAYMENT_AMOUNT'], 'number'],
            [['ADDRESS'], 'string'],
            [['MOBILE'], 'string', 'max' => 25],
            [['SURNAME', 'OTHER_NAMES', 'CITY_NAME', 'COUNTRY_NAME'], 'string', 'max' => 100],
            [['ORDER_STATUS', 'PAYMENT_NUMBER'], 'string', 'max' => 30],
            [['NOTES', 'LOCATION_NAME'], 'string', 'max' => 255],
            [['PAYMENT_METHOD'], 'string', 'max' => 20],
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
            'KITCHEN_ID' => 'Kitchen  ID',
            'CHEF_ID' => 'Chef  ID',
            'RIDER_ID' => 'Rider  ID',
            'MOBILE' => 'Mobile',
            'SURNAME' => 'Surname',
            'OTHER_NAMES' => 'Other  Names',
            'ORDER_DATE' => 'Order  Date',
            'ORDER_STATUS' => 'Status of the order',
            'PAYMENT_AMOUNT' => 'Payment  Amount',
            'PAYMENT_NUMBER' => 'Payment  Number',
            'NOTES' => 'Can contain payment text from mobile transactions etc',
            'PAYMENT_METHOD' => 'Payment  Method',
            'CREATED_AT' => 'Created  At',
            'UPDATED_AT' => 'Updated  At',
            'PAYMENT_DATE' => 'Payment  Date',
            'LOCATION_ID' => 'Location  ID',
            'LOCATION_NAME' => 'Location  Name',
            'ADDRESS' => 'Address',
            'CITY_NAME' => 'City  Name',
            'CITY_ID' => 'City  ID',
            'COUNRY_ID' => 'Counry  ID',
            'COUNTRY_NAME' => 'Country  Name',
        ];
    }
}
