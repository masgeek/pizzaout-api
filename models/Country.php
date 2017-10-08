<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $Country_ID
 * @property string $Country_Name
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
            [['Country_Name'], 'required'],
            [['Country_Name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Country_ID' => 'Country  ID',
            'Country_Name' => 'Country  Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['Country_ID' => 'Country_ID']);
    }
}
