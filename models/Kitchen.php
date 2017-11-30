<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kitchen".
 *
 * @property int $KITCHEN_ID
 * @property string $KITCHEN_NAME
 * @property int $CITY_ID
 * @property string $OPENING_TIME
 * @property string $CLOSING_TIME
 * @property string $ADDRESS
 */
class Kitchen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kitchen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KITCHEN_ID', 'KITCHEN_NAME', 'CITY_ID'], 'required'],
            [['KITCHEN_ID', 'CITY_ID'], 'integer'],
            [['OPENING_TIME', 'CLOSING_TIME'], 'safe'],
            [['ADDRESS'], 'string'],
            [['KITCHEN_NAME'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KITCHEN_ID' => 'Kitchen  ID',
            'KITCHEN_NAME' => 'Kitchen  Name',
            'CITY_ID' => 'City  ID',
            'OPENING_TIME' => 'Opening  Time',
            'CLOSING_TIME' => 'Closing  Time',
            'ADDRESS' => 'Address',
        ];
    }
}
