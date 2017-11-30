<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_type".
 *
 * @property int $USER_TYPE_ID
 * @property string $USER_TYPE_NAME
 */
class UserType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_TYPE_ID', 'USER_TYPE_NAME'], 'required'],
            [['USER_TYPE_ID'], 'integer'],
            [['USER_TYPE_NAME'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_TYPE_ID' => 'User  Type  ID',
            'USER_TYPE_NAME' => 'User  Type  Name',
        ];
    }
}
