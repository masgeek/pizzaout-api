<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riders".
 *
 * @property string $RIDER_ID
 * @property string $RIDER_NAME
 * @property string $RIDER_MOBILE
 * @property int $RIDER_STATUS
 *
 * @property CustomerOrder[] $customerOrders
 */
class Riders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RIDER_NAME'], 'required'],
            [['RIDER_STATUS'], 'integer'],
            [['RIDER_NAME'], 'string', 'max' => 100],
            [['RIDER_MOBILE'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'RIDER_ID' => 'Rider  ID',
            'RIDER_NAME' => 'Rider  Name',
            'RIDER_MOBILE' => 'Rider  Mobile',
            'RIDER_STATUS' => 'Rider  Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrders()
    {
        return $this->hasMany(CustomerOrder::className(), ['RIDER_ID' => 'RIDER_ID']);
    }
}
