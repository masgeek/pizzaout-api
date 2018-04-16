<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vw_sales_reports".
 *
 * @property string $ORDER_ID
 * @property string $LOCATION_ID
 * @property string $KITCHEN_ID
 * @property string $CHEF_ID
 * @property string $RIDER_ID
 * @property string $ORDER_DATE
 * @property string $PAYMENT_METHOD
 * @property string $ORDER_STATUS Status of the order
 * @property string $ORDER_TIME
 * @property string $NOTES Can contain payment text from mobile transactions etc
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 * @property string $USER_ID
 * @property string $USER_NAME
 * @property string $USER_TYPE
 * @property string $SURNAME
 * @property string $OTHER_NAMES
 * @property string $LOCATION_NAME
 * @property string $COUNTRY_ID
 * @property string $CHEF_NAME
 */
class VwSalesReports extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vw_sales_reports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'LOCATION_ID', 'KITCHEN_ID', 'CHEF_ID', 'RIDER_ID', 'USER_ID', 'USER_TYPE', 'COUNTRY_ID'], 'integer'],
            [['LOCATION_ID', 'ORDER_DATE', 'PAYMENT_METHOD', 'ORDER_STATUS', 'USER_NAME', 'USER_TYPE', 'SURNAME', 'OTHER_NAMES', 'LOCATION_NAME', 'COUNTRY_ID', 'CHEF_NAME'], 'required'],
            [['ORDER_DATE', 'CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['PAYMENT_METHOD', 'ORDER_TIME'], 'string', 'max' => 20],
            [['ORDER_STATUS'], 'string', 'max' => 30],
            [['NOTES', 'LOCATION_NAME'], 'string', 'max' => 255],
            [['USER_NAME', 'SURNAME', 'OTHER_NAMES', 'CHEF_NAME'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ORDER_ID' => 'Order  ID',
            'LOCATION_ID' => 'Location  ID',
            'KITCHEN_ID' => 'Kitchen  ID',
            'CHEF_ID' => 'Chef  ID',
            'RIDER_ID' => 'Rider  ID',
            'ORDER_DATE' => 'Order  Date',
            'PAYMENT_METHOD' => 'Payment  Method',
            'ORDER_STATUS' => 'Status of the order',
            'ORDER_TIME' => 'Order  Time',
            'NOTES' => 'Can contain payment text from mobile transactions etc',
            'CREATED_AT' => 'Created  At',
            'UPDATED_AT' => 'Updated  At',
            'USER_ID' => 'User  ID',
            'USER_NAME' => 'User  Name',
            'USER_TYPE' => 'User  Type',
            'SURNAME' => 'Surname',
            'OTHER_NAMES' => 'Other  Names',
            'LOCATION_NAME' => 'Location  Name',
            'COUNTRY_ID' => 'Country  ID',
            'CHEF_NAME' => 'Chef  Name',
        ];
    }
}
