<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property string $CITY_ID
 * @property string $CITY_NAME
 * @property string $COUNTRY_ID
 *
 * @property Country $cOUNTRY
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
            [['CITY_NAME', 'COUNTRY_ID'], 'required'],
            [['COUNTRY_ID'], 'integer'],
            [['CITY_NAME'], 'string', 'max' => 100],
            [['COUNTRY_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['COUNTRY_ID' => 'COUNRY_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CITY_ID' => Yii::t('app', 'City  ID'),
            'CITY_NAME' => Yii::t('app', 'City  Name'),
            'COUNTRY_ID' => Yii::t('app', 'Country  ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCOUNTRY()
    {
        return $this->hasOne(Country::className(), ['COUNRY_ID' => 'COUNTRY_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKitchens()
    {
        return $this->hasMany(Kitchen::className(), ['CITY_ID' => 'CITY_ID']);
    }
}
