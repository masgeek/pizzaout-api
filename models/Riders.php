<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riders".
 *
 * @property string $Rider_ID
 * @property string $Rider_Name
 */
class Riders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Rider_Name'], 'required'],
            [['Rider_Name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Rider_ID' => 'Rider  ID',
            'Rider_Name' => 'Rider  Name',
        ];
    }
}
