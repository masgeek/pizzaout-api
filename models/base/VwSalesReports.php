<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "vw_sales_reports".
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
 * @property string $USER_NAME
 * @property int $USER_TYPE
 * @property string $SURNAME
 * @property string $OTHER_NAMES
 */
class VwSalesReports extends \app\common\BaseModel
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
            [['ORDER_ID', 'USER_ID', 'LOCATION_ID', 'KITCHEN_ID', 'CHEF_ID', 'RIDER_ID', 'ORDERED_BY', 'UPDATED_BY', 'USER_TYPE'], 'integer'],
            [['USER_ID', 'ORDER_DATE', 'PAYMENT_METHOD', 'ORDER_STATUS', 'TABLE_NUMBER', 'USER_NAME', 'USER_TYPE', 'SURNAME', 'OTHER_NAMES'], 'required'],
            [['ORDER_DATE', 'CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['PAYMENT_METHOD', 'ORDER_TIME'], 'string', 'max' => 20],
            [['ORDER_STATUS'], 'string', 'max' => 30],
            [['NOTES'], 'string', 'max' => 255],
            [['TABLE_NUMBER'], 'string', 'max' => 15],
            [['USER_NAME', 'SURNAME', 'OTHER_NAMES'], 'string', 'max' => 100],
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
            'USER_NAME' => Yii::t('app', 'User Name'),
            'USER_TYPE' => Yii::t('app', 'User Type'),
            'SURNAME' => Yii::t('app', 'Surname'),
            'OTHER_NAMES' => Yii::t('app', 'Other Names'),
        ];
    }
}
