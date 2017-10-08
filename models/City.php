<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property string $City_ID
 * @property string $City_Name
 * @property string $Country_ID
 *
 * @property Country $country
 * @property Kitchen[] $kitchens
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['City_Name', 'Country_ID'], 'required'],
            [['Country_ID'], 'integer'],
            [['City_Name'], 'string', 'max' => 100],
            [['Country_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['Country_ID' => 'Country_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'City_ID' => 'City  ID',
            'City_Name' => 'City  Name',
            'Country_ID' => 'Country  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::className(), ['Country_ID' => 'Country_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKitchens()
    {
        return $this->hasMany(Kitchen::className(), ['City_ID' => 'City_ID']);
    }
}
