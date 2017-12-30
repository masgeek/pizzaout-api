<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $LOCATION_ID
 * @property string $LOCATION_NAME
 * @property int $CITY_ID
 * @property string $ADDRESS
 *
 * @property CustomerAddress[] $customerAddresses
 * @property City $cITY
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
            [['CITY_ID'], 'integer'],
            [['ADDRESS'], 'string'],
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
            'LOCATION_ID' => Yii::t('app', 'Location  ID'),
            'LOCATION_NAME' => Yii::t('app', 'Location  Name'),
            'CITY_ID' => Yii::t('app', 'City  ID'),
            'ADDRESS' => Yii::t('app', 'Address'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerAddresses()
    {
        return $this->hasMany(CustomerAddress::className(), ['LOCATION_ID' => 'LOCATION_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCITY()
    {
        return $this->hasOne(City::className(), ['CITY_ID' => 'CITY_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['LOCATION_ID' => 'LOCATION_ID']);
    }
}
