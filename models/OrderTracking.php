<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_tracking".
 *
 * @property int $TRACKING_ID
 * @property int $ORDER_ID
 * @property string $COMMENTS
 * @property string $STATUS
 * @property string $TRACKING_DATE
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
            [['TRACKING_ID', 'ORDER_ID', 'STATUS'], 'required'],
            [['TRACKING_ID', 'ORDER_ID'], 'integer'],
            [['TRACKING_DATE'], 'safe'],
            [['COMMENTS'], 'string', 'max' => 255],
            [['STATUS'], 'string', 'max' => 30],
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
}
