<?php

namespace app\models;

/**
 * This is the model class for table "order_tracking".
 *
 * @property string $TRACKING_ID
 * @property string $ORDER_ID
 * @property string $COMMENTS
 * @property string $STATUS
 * @property string $TRACKING_DATE
 *
 * @property CustomerOrder $oRDER
 * @property Status $sTATUS
 */
class OrderTracking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_tracking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'STATUS'], 'required'],
            [['ORDER_ID'], 'integer'],
            [['TRACKING_DATE'], 'safe'],
            [['COMMENTS'], 'string', 'max' => 255],
            [['STATUS'], 'string', 'max' => 30],
            [['ORDER_ID', 'STATUS'], 'unique', 'targetAttribute' => ['ORDER_ID', 'STATUS']],
            [['ORDER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerOrder::className(), 'targetAttribute' => ['ORDER_ID' => 'ORDER_ID']],
            [['STATUS'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['STATUS' => 'STATUS_NAME']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TRACKING_ID' => 'Tracking  ID',
            'ORDER_ID' => 'Order  ID',
            'COMMENTS' => 'Comments',
            'STATUS' => 'Status',
            'TRACKING_DATE' => 'Tracking  Date',
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
    public function getSTATUS()
    {
        return $this->hasOne(Status::className(), ['STATUS_NAME' => 'STATUS']);
    }
}
