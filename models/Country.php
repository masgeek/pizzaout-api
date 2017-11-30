<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property int $COUNRY_ID
 * @property string $COUNTRY_NAME
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
            [['COUNRY_ID', 'COUNTRY_NAME'], 'required'],
            [['COUNRY_ID'], 'integer'],
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
}
