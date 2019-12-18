<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "vw_sales_reports".
 *
 * @property int $ORDER_ID
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
 * @property int $USER_ID
 * @property string $USER_NAME
 * @property int $USER_TYPE
 * @property string $SURNAME
 * @property string $OTHER_NAMES
 * @property string $LOCATION_NAME
 * @property int $COUNTRY_ID
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
            [['ORDER_DATE', 'PAYMENT_METHOD', 'ORDER_STATUS', 'USER_NAME', 'USER_TYPE', 'SURNAME', 'OTHER_NAMES', 'LOCATION_NAME', 'COUNTRY_ID', 'CHEF_NAME'], 'required'],
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
            'ORDER_ID' => Yii::t('app', 'Order ID'),
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
            'USER_ID' => Yii::t('app', 'User ID'),
            'USER_NAME' => Yii::t('app', 'User Name'),
            'USER_TYPE' => Yii::t('app', 'User Type'),
            'SURNAME' => Yii::t('app', 'Surname'),
            'OTHER_NAMES' => Yii::t('app', 'Other Names'),
            'LOCATION_NAME' => Yii::t('app', 'Location Name'),
            'COUNTRY_ID' => Yii::t('app', 'Country ID'),
            'CHEF_NAME' => Yii::t('app', 'Chef Name'),
        ];
    }
}
