<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_type".
 *
 * @property string $Type_ID
 * @property string $Type_Name
 *
 * @property Users[] $users
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
            [['Type_Name'], 'required'],
            [['Type_Name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Type_ID' => 'Type  ID',
            'Type_Name' => 'Type  Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['User_Type' => 'Type_ID']);
    }
}
