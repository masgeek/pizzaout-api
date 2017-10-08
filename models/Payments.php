<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property int $payment_id
 * @property int $order_id
 * @property string $payment_ref
 * @property string $payment_channel
 * @property double $payment_amount
 * @property string $payment_date
 * @property string $payment_status
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'payment_ref', 'payment_channel', 'payment_amount', 'payment_date', 'payment_status'], 'required'],
            [['order_id'], 'integer'],
            [['payment_amount'], 'number'],
            [['payment_date'], 'safe'],
            [['payment_ref'], 'string', 'max' => 255],
            [['payment_channel'], 'string', 'max' => 10],
            [['payment_status'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'payment_id' => 'Payment ID',
            'order_id' => 'Order ID',
            'payment_ref' => 'Payment Ref',
            'payment_channel' => 'Payment Channel',
            'payment_amount' => 'Payment Amount',
            'payment_date' => 'Payment Date',
            'payment_status' => 'Payment Status',
        ];
    }
}
