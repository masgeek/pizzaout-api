<?php

namespace app\models;

/**
 * This is the model class for table "payment".
 *
 * @property string $PAYMENT_ID
 * @property string $ORDER_ID
 * @property string $PAYMENT_CHANNEL
 * @property string $PAYMENT_AMOUNT
 * @property string $PAYMENT_REF
 * @property string $PAYMENT_STATUS
 * @property string $PAYMENT_DATE
 * @property string $PAYMENT_NUMBER
 * @property string $PAYMENT_NOTES
 *
 * @property Status $pAYMENTSTATUS
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
            [['ORDER_ID'], 'integer'],
            [['PAYMENT_CHANNEL', 'PAYMENT_AMOUNT', 'PAYMENT_REF', 'PAYMENT_DATE'], 'required'],
            [['PAYMENT_AMOUNT'], 'number'],
            [['PAYMENT_DATE'], 'safe'],
            [['PAYMENT_CHANNEL', 'PAYMENT_REF', 'PAYMENT_NOTES'], 'string', 'max' => 255],
            [['PAYMENT_STATUS'], 'string', 'max' => 30],
            [['PAYMENT_NUMBER'], 'string', 'max' => 20],
            [['PAYMENT_STATUS'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['PAYMENT_STATUS' => 'STATUS_NAME']],
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
            'PAYMENT_CHANNEL' => 'Payment  Channel',
            'PAYMENT_AMOUNT' => 'Payment  Amount',
            'PAYMENT_REF' => 'Payment  Ref',
            'PAYMENT_STATUS' => 'Payment  Status',
            'PAYMENT_DATE' => 'Payment  Date',
            'PAYMENT_NUMBER' => 'Payment  Number',
            'PAYMENT_NOTES' => 'Payment  Notes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPAYMENTSTATUS()
    {
        return $this->hasOne(Status::className(), ['STATUS_NAME' => 'PAYMENT_STATUS']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getORDER()
    {
        return $this->hasOne(CustomerOrder::className(), ['ORDER_ID' => 'ORDER_ID']);
    }
}
