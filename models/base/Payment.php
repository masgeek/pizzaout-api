<?php

namespace app\models\base;

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
 * @property int $PAYMENT_DATE
 * @property string $PAYMENT_NOTES
 * @property string $PAYMENT_NUMBER
 * @property double $AMOUNT_RECEIVED
 * @property double $CHANGE_DUE
 * @property int $UPDATED_AT
 * @property int $CREATED_BY
 * @property int $UPDATED_BY
 *
 * @property CustomerOrder $oRDER
 * @property Status $pAYMENTSTATUS
 */
class Payment extends \app\common\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'PAYMENT_CHANNEL', 'PAYMENT_AMOUNT', 'PAYMENT_REF', 'AMOUNT_RECEIVED', 'CHANGE_DUE'], 'required'],
            [['ORDER_ID', 'PAYMENT_DATE', 'UPDATED_AT', 'CREATED_BY', 'UPDATED_BY'], 'integer'],
            [['PAYMENT_AMOUNT', 'AMOUNT_RECEIVED', 'CHANGE_DUE'], 'number'],
            [['PAYMENT_CHANNEL', 'PAYMENT_REF', 'PAYMENT_NOTES'], 'string', 'max' => 255],
            [['PAYMENT_STATUS', 'PAYMENT_NUMBER'], 'string', 'max' => 30],
            [['ORDER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerOrder::className(), 'targetAttribute' => ['ORDER_ID' => 'ORDER_ID']],
            [['PAYMENT_STATUS'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['PAYMENT_STATUS' => 'STATUS_NAME']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PAYMENT_ID' => Yii::t('app', 'Payment ID'),
            'ORDER_ID' => Yii::t('app', 'Order ID'),
            'PAYMENT_CHANNEL' => Yii::t('app', 'Payment Channel'),
            'PAYMENT_AMOUNT' => Yii::t('app', 'Payment Amount'),
            'PAYMENT_REF' => Yii::t('app', 'Payment Ref'),
            'PAYMENT_STATUS' => Yii::t('app', 'Payment Status'),
            'PAYMENT_DATE' => Yii::t('app', 'Payment Date'),
            'PAYMENT_NOTES' => Yii::t('app', 'Payment Notes'),
            'PAYMENT_NUMBER' => Yii::t('app', 'Payment Number'),
            'AMOUNT_RECEIVED' => Yii::t('app', 'Amount Received'),
            'CHANGE_DUE' => Yii::t('app', 'Change Due'),
            'UPDATED_AT' => Yii::t('app', 'Updated At'),
            'CREATED_BY' => Yii::t('app', 'Created By'),
            'UPDATED_BY' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getORDER()
    {
        return $this->hasOne(CustomerOrder::className(), ['ORDER_ID' => 'ORDER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPAYMENTSTATUS()
    {
        return $this->hasOne(Status::className(), ['STATUS_NAME' => 'PAYMENT_STATUS']);
    }
}
