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
 * @property int $MOBILE
 * @property string $SURNAME
 * @property string $OTHER_NAMES
 * @property string $ORDER_DATE
 * @property string $ORDER_STATUS Status of the order
 * @property string $PAYMENT_AMOUNT
 * @property string $PAYMENT_NUMBER
 * @property string $NOTES Can contain payment text from mobile transactions etc
 * @property string $ADDRESS_ID
 * @property string $PAYMENT_METHOD
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 * @property string $PAYMENT_DATE
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
            [['ORDER_ID', 'USER_ID', 'KITCHEN_ID', 'CHEF_ID', 'RIDER_ID', 'MOBILE', 'ADDRESS_ID'], 'integer'],
            [['USER_ID', 'MOBILE', 'SURNAME', 'OTHER_NAMES', 'ORDER_DATE', 'ORDER_STATUS', 'PAYMENT_AMOUNT', 'PAYMENT_METHOD', 'PAYMENT_DATE'], 'required'],
            [['ORDER_DATE', 'CREATED_AT', 'UPDATED_AT', 'PAYMENT_DATE'], 'safe'],
            [['PAYMENT_AMOUNT'], 'number'],
            [['SURNAME', 'OTHER_NAMES'], 'string', 'max' => 100],
            [['ORDER_STATUS', 'PAYMENT_NUMBER'], 'string', 'max' => 30],
            [['NOTES'], 'string', 'max' => 255],
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
            'ADDRESS_ID' => Yii::t('app', 'Address  ID'),
            'PAYMENT_METHOD' => Yii::t('app', 'Payment  Method'),
            'CREATED_AT' => Yii::t('app', 'Created  At'),
            'UPDATED_AT' => Yii::t('app', 'Updated  At'),
            'PAYMENT_DATE' => Yii::t('app', 'Payment  Date'),
        ];
    }
}
