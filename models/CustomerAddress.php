<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_address".
 *
 * @property int $ADDRESS_ID
 * @property int $USER_ID
 * @property int $LOCATION_ID
 * @property string $ADDRESS
 */
class CustomerAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADDRESS_ID', 'USER_ID', 'ADDRESS'], 'required'],
            [['ADDRESS_ID', 'USER_ID', 'LOCATION_ID'], 'integer'],
            [['ADDRESS'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ADDRESS_ID' => 'Address  ID',
            'USER_ID' => 'User  ID',
            'LOCATION_ID' => 'Location  ID',
            'ADDRESS' => 'Address',
        ];
    }
}
