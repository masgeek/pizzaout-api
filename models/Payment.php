<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $PAYMENT_ID
 * @property int $ORDER_ID
 * @property string $PAYMENT_CHANNEL
 * @property string $PAYMENT_AMOUNT
 * @property string $PAYMENT_REF
 * @property string $PAYMENT_STATUS
 * @property string $PAYMENT_DATE
 * @property string $PAYMENT_NOTES
 * @property string $PAYMENT_NUMBER
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PAYMENT_ID', 'PAYMENT_CHANNEL', 'PAYMENT_AMOUNT', 'PAYMENT_REF', 'PAYMENT_DATE'], 'required'],
            [['PAYMENT_ID', 'ORDER_ID'], 'integer'],
            [['PAYMENT_AMOUNT'], 'number'],
            [['PAYMENT_DATE'], 'safe'],
            [['PAYMENT_CHANNEL', 'PAYMENT_REF', 'PAYMENT_NOTES'], 'string', 'max' => 255],
            [['PAYMENT_STATUS', 'PAYMENT_NUMBER'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PAYMENT_ID' => 'Payment  ID',
            'ORDER_ID' => 'Order  ID',
            'PAYMENT_CHANNEL' => 'Payment  Channel',
            'PAYMENT_AMOUNT' => 'Payment  Amount',
            'PAYMENT_REF' => 'Payment  Ref',
            'PAYMENT_STATUS' => 'Payment  Status',
            'PAYMENT_DATE' => 'Payment  Date',
            'PAYMENT_NOTES' => 'Payment  Notes',
            'PAYMENT_NUMBER' => 'Payment  Number',
        ];
    }
}
