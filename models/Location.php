<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $LOCATION_ID
 * @property string $LOCATION_NAME
 * @property string $ADDRESS
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
            [['LOCATION_ID', 'LOCATION_NAME'], 'required'],
            [['LOCATION_ID'], 'integer'],
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
            'LOCATION_ID' => 'Location  ID',
            'LOCATION_NAME' => 'Location  Name',
            'ADDRESS' => 'Address',
        ];
    }
}
