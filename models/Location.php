<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property string $LOCATION_ID
 * @property string $LOCATION_NAME
 * @property string $ADDRESS
 *
 * @property CustomerAddress[] $customerAddresses
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
            [['ADDRESS'], 'string'],
            [['LOCATION_NAME'], 'string', 'max' => 255],
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
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['LOCATION_ID' => 'LOCATION_ID']);
    }
}
