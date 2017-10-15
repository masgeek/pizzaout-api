<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $PAYMENT_ID
 * @property string $ORDER_ID
 * @property string $PAYMENT_REF
 * @property string $PAYMENT_CHANNEL
 * @property double $PAYMENT_AMOUNT
 * @property string $PAYMENT_DATE
 * @property string $PAYMENT_STATUS
 *
 * @property CustomerOrder $oRDER
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
            [['ORDER_ID', 'PAYMENT_REF', 'PAYMENT_CHANNEL', 'PAYMENT_AMOUNT', 'PAYMENT_DATE', 'PAYMENT_STATUS'], 'required'],
            [['ORDER_ID'], 'integer'],
            [['PAYMENT_AMOUNT'], 'number'],
            [['PAYMENT_DATE'], 'safe'],
            [['PAYMENT_REF'], 'string', 'max' => 255],
            [['PAYMENT_CHANNEL'], 'string', 'max' => 10],
            [['PAYMENT_STATUS'], 'string', 'max' => 50],
            [['ORDER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerOrder::className(), 'targetAttribute' => ['ORDER_ID' => 'ORDER_ID']],
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
            'PAYMENT_REF' => 'Payment  Ref',
            'PAYMENT_CHANNEL' => 'Payment  Channel',
            'PAYMENT_AMOUNT' => 'Payment  Amount',
            'PAYMENT_DATE' => 'Payment  Date',
            'PAYMENT_STATUS' => 'Payment  Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getORDER()
    {
        return $this->hasOne(CustomerOrder::className(), ['ORDER_ID' => 'ORDER_ID']);
    }
}
