<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $LOCATION_ID
 * @property string $LOCATION_NAME
 *
 * @property Order[] $orders
 * @property Users[] $users
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOCATION_NAME'], 'required'],
            [['LOCATION_NAME'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LOCATION_ID' => 'Location  ID',
            'LOCATION_NAME' => 'Location  Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['LOCATION_ID' => 'LOCATION_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['LOCATION_ID' => 'LOCATION_ID']);
    }
}