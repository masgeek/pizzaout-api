<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property string $LOCATION_ID
 * @property string $CITY_ID
 * @property string $LOCATION_NAME
 * @property string $ADDRESS
 * @property bool $ACTIVE
 *
 * @property CustomerOrder[] $customerOrders
 * @property City $cITY
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
            [['CITY_ID'], 'integer'],
            [['LOCATION_NAME'], 'required'],
            [['ADDRESS'], 'string'],
            [['ACTIVE'], 'boolean'],
            [['LOCATION_NAME'], 'string', 'max' => 255],
            [['CITY_ID'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['CITY_ID' => 'CITY_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LOCATION_ID' => 'Location  ID',
            'CITY_ID' => 'City  ID',
            'LOCATION_NAME' => 'Location  Name',
            'ADDRESS' => 'Address',
            'ACTIVE' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrders()
    {
        return $this->hasMany(CustomerOrder::className(), ['LOCATION_ID' => 'LOCATION_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCITY()
    {
        return $this->hasOne(City::className(), ['CITY_ID' => 'CITY_ID']);
    }
}
