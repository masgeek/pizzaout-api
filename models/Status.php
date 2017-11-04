<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%status}}".
 *
 * @property string $STATUS_NAME
 * @property string $STATUS_DESC
 * @property string $COLOR
 * @property string $SCOPE
 * @property int $RANK
 *
 * @property CustomerOrder[] $customerOrders
 * @property OrderTracking[] $orderTrackings
 * @property CustomerOrder[] $oRDERs
 * @property Payment[] $payments
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS_NAME'], 'required'],
            [['RANK'], 'integer'],
            [['STATUS_NAME'], 'string', 'max' => 30],
            [['STATUS_DESC'], 'string', 'max' => 100],
            [['COLOR', 'SCOPE'], 'string', 'max' => 10],
            [['STATUS_NAME'], 'unique'],
            [['RANK'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STATUS_NAME' => 'Status  Name',
            'STATUS_DESC' => 'Status  Desc',
            'COLOR' => 'Color',
            'SCOPE' => 'Scope',
            'RANK' => 'Rank',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrders()
    {
        return $this->hasMany(CustomerOrder::className(), ['ORDER_STATUS' => 'STATUS_NAME']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderTrackings()
    {
        return $this->hasMany(OrderTracking::className(), ['STATUS' => 'STATUS_NAME']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getORDERs()
    {
        return $this->hasMany(CustomerOrder::className(), ['ORDER_ID' => 'ORDER_ID'])->viaTable('order_tracking', ['STATUS' => 'STATUS_NAME']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['PAYMENT_STATUS' => 'STATUS_NAME']);
    }
}
