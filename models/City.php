<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "city".
 *
 * @property int $CITY_ID
 * @property string $CITY_NAME
 * @property int $COUNTRY_ID
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
            [['CITY_ID', 'CITY_NAME', 'COUNTRY_ID'], 'required'],
            [['CITY_ID', 'COUNTRY_ID'], 'integer'],
            [['CITY_NAME'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CITY_ID' => 'City  ID',
            'CITY_NAME' => 'City  Name',
            'COUNTRY_ID' => 'Country  ID',
        ];
    }
}
