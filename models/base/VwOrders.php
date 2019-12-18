<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "vw_orders".
 *
 * @property int $ORDER_ID
 * @property int $USER_ID
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
 * @property int $PAYMENT_ID
 * @property string $PAYMENT_CHANNEL
 * @property string $PAYMENT_AMOUNT
 * @property string $PAYMENT_REF
 * @property string $PAYMENT_STATUS
 * @property int $PAYMENT_DATE
 * @property string $PAYMENT_NOTES
 * @property string $PAYMENT_NUMBER
 * @property double $AMOUNT_RECEIVED
 * @property double $CHANGE_DUE
 */
class VwOrders extends \app\common\BaseModel
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
            [['ORDER_ID', 'USER_ID', 'ORDERED_BY', 'UPDATED_BY', 'PAYMENT_ID', 'PAYMENT_DATE'], 'integer'],
            [['USER_ID', 'ORDER_DATE', 'PAYMENT_METHOD', 'ORDER_STATUS', 'TABLE_NUMBER'], 'required'],
            [['ORDER_DATE', 'CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['PAYMENT_AMOUNT', 'AMOUNT_RECEIVED', 'CHANGE_DUE'], 'number'],
            [['PAYMENT_METHOD', 'ORDER_TIME'], 'string', 'max' => 20],
            [['ORDER_STATUS', 'PAYMENT_STATUS', 'PAYMENT_NUMBER'], 'string', 'max' => 30],
            [['NOTES', 'PAYMENT_CHANNEL', 'PAYMENT_REF', 'PAYMENT_NOTES'], 'string', 'max' => 255],
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
            'USER_ID' => Yii::t('app', 'User ID'),
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
            'PAYMENT_ID' => Yii::t('app', 'Payment ID'),
            'PAYMENT_CHANNEL' => Yii::t('app', 'Payment Channel'),
            'PAYMENT_AMOUNT' => Yii::t('app', 'Payment Amount'),
            'PAYMENT_REF' => Yii::t('app', 'Payment Ref'),
            'PAYMENT_STATUS' => Yii::t('app', 'Payment Status'),
            'PAYMENT_DATE' => Yii::t('app', 'Payment Date'),
            'PAYMENT_NOTES' => Yii::t('app', 'Payment Notes'),
            'PAYMENT_NUMBER' => Yii::t('app', 'Payment Number'),
            'AMOUNT_RECEIVED' => Yii::t('app', 'Amount Received'),
            'CHANGE_DUE' => Yii::t('app', 'Change Due'),
        ];
    }
}
