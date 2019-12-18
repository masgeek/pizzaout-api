<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "riders".
 *
 * @property int $RIDER_ID
 * @property int $USER_ID
 * @property int $KITCHEN_ID
 * @property bool $RIDER_STATUS
 *
 * @property CustomerOrder[] $customerOrders
 * @property Kitchen $kITCHEN
 * @property Users $uSER
 */
class Riders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'riders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['USER_ID', 'KITCHEN_ID'], 'integer'],
            [['RIDER_STATUS'], 'boolean'],
            [['KITCHEN_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Kitchen::className(), 'targetAttribute' => ['KITCHEN_ID' => 'KITCHEN_ID']],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'RIDER_ID' => Yii::t('app', 'Rider ID'),
            'USER_ID' => Yii::t('app', 'User ID'),
            'KITCHEN_ID' => Yii::t('app', 'Kitchen ID'),
            'RIDER_STATUS' => Yii::t('app', 'Rider Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrders()
    {
        return $this->hasMany(CustomerOrder::className(), ['RIDER_ID' => 'RIDER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKITCHEN()
    {
        return $this->hasOne(Kitchen::className(), ['KITCHEN_ID' => 'KITCHEN_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(Users::className(), ['USER_ID' => 'USER_ID']);
    }
}
