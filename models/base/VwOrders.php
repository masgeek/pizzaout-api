<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "vw_orders".
 *
 * @property int $ORDER_ID
 * @property string $ORDER_DATE
 * @property string $ORDER_STATUS Status of the order
 * @property string $PAYMENT_AMOUNT
 * @property string $PAYMENT_NUMBER
 * @property string $NOTES Can contain payment text from mobile transactions etc
 * @property string $PAYMENT_METHOD
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 * @property string $PAYMENT_DATE
 * @property string $ORDER_TIME
 * @property string $TABLE_NUMBER
 * @property int $ORDERED_BY
 * @property int $UPDATED_BY
 * @property int $USER_ID
 */
class VwOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vw_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'ORDERED_BY', 'UPDATED_BY', 'USER_ID'], 'integer'],
            [['ORDER_DATE', 'ORDER_STATUS', 'PAYMENT_METHOD', 'TABLE_NUMBER', 'USER_ID'], 'required'],
            [['ORDER_DATE', 'CREATED_AT', 'UPDATED_AT', 'PAYMENT_DATE'], 'safe'],
            [['PAYMENT_AMOUNT'], 'number'],
            [['ORDER_STATUS', 'PAYMENT_NUMBER'], 'string', 'max' => 30],
            [['NOTES'], 'string', 'max' => 255],
            [['PAYMENT_METHOD', 'ORDER_TIME'], 'string', 'max' => 20],
            [['TABLE_NUMBER'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ORDER_ID' => Yii::t('app', 'Order ID'),
            'ORDER_DATE' => Yii::t('app', 'Order Date'),
            'ORDER_STATUS' => Yii::t('app', 'Status of the order'),
            'PAYMENT_AMOUNT' => Yii::t('app', 'Payment Amount'),
            'PAYMENT_NUMBER' => Yii::t('app', 'Payment Number'),
            'NOTES' => Yii::t('app', 'Can contain payment text from mobile transactions etc'),
            'PAYMENT_METHOD' => Yii::t('app', 'Payment Method'),
            'CREATED_AT' => Yii::t('app', 'Created At'),
            'UPDATED_AT' => Yii::t('app', 'Updated At'),
            'PAYMENT_DATE' => Yii::t('app', 'Payment Date'),
            'ORDER_TIME' => Yii::t('app', 'Order Time'),
            'TABLE_NUMBER' => Yii::t('app', 'Table Number'),
            'ORDERED_BY' => Yii::t('app', 'Ordered By'),
            'UPDATED_BY' => Yii::t('app', 'Updated By'),
            'USER_ID' => Yii::t('app', 'User ID'),
        ];
    }
}
