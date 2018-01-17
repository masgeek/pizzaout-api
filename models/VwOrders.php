<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vw_orders".
 *
 * @property int $ORDER_ID
 * @property int $USER_ID
 * @property int $KITCHEN_ID
 * @property int $CHEF_ID
 * @property int $RIDER_ID
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
 * @property int $LOCATION_ID
 * @property string $LOCATION_NAME
 * @property string $ADDRESS
 * @property string $CITY_NAME
 * @property int $CITY_ID
 * @property int $COUNRY_ID
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
            'ORDER_ID' => Yii::t('app', 'Order  ID'),
            'USER_ID' => Yii::t('app', 'User  ID'),
            'KITCHEN_ID' => Yii::t('app', 'Kitchen  ID'),
            'CHEF_ID' => Yii::t('app', 'Chef  ID'),
            'RIDER_ID' => Yii::t('app', 'Rider  ID'),
            'MOBILE' => Yii::t('app', 'Mobile'),
            'SURNAME' => Yii::t('app', 'Surname'),
            'OTHER_NAMES' => Yii::t('app', 'Other  Names'),
            'ORDER_DATE' => Yii::t('app', 'Order  Date'),
            'ORDER_STATUS' => Yii::t('app', 'Status of the order'),
            'PAYMENT_AMOUNT' => Yii::t('app', 'Payment  Amount'),
            'PAYMENT_NUMBER' => Yii::t('app', 'Payment  Number'),
            'NOTES' => Yii::t('app', 'Can contain payment text from mobile transactions etc'),
            'PAYMENT_METHOD' => Yii::t('app', 'Payment  Method'),
            'CREATED_AT' => Yii::t('app', 'Created  At'),
            'UPDATED_AT' => Yii::t('app', 'Updated  At'),
            'PAYMENT_DATE' => Yii::t('app', 'Payment  Date'),
            'LOCATION_ID' => Yii::t('app', 'Location  ID'),
            'LOCATION_NAME' => Yii::t('app', 'Location  Name'),
            'ADDRESS' => Yii::t('app', 'Address'),
            'CITY_NAME' => Yii::t('app', 'City  Name'),
            'CITY_ID' => Yii::t('app', 'City  ID'),
            'COUNRY_ID' => Yii::t('app', 'Counry  ID'),
            'COUNTRY_NAME' => Yii::t('app', 'Country  Name'),
        ];
    }
}
