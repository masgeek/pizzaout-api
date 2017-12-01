<?php

namespace app\models;

/**
 * This is the model class for table "country".
 *
 * @property string $COUNRY_ID
 * @property string $COUNTRY_NAME
 *
 * @property City[] $cities
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COUNTRY_NAME'], 'required'],
            [['COUNTRY_NAME'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'COUNRY_ID' => 'Counry  ID',
            'COUNTRY_NAME' => 'Country  Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['COUNTRY_ID' => 'COUNRY_ID']);
    }
}
