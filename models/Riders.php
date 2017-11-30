<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "riders".
 *
 * @property int $RIDER_ID
 * @property int $KITCHEN_ID
 * @property string $RIDER_NAME
 * @property string $RIDER_MOBILE
 * @property int $RIDER_STATUS
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
            [['RIDER_ID', 'RIDER_NAME'], 'required'],
            [['RIDER_ID', 'KITCHEN_ID', 'RIDER_STATUS'], 'integer'],
            [['RIDER_NAME'], 'string', 'max' => 100],
            [['RIDER_MOBILE'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'RIDER_ID' => 'Rider  ID',
            'KITCHEN_ID' => 'Kitchen  ID',
            'RIDER_NAME' => 'Rider  Name',
            'RIDER_MOBILE' => 'Rider  Mobile',
            'RIDER_STATUS' => 'Rider  Status',
        ];
    }
}
