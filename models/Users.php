<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property int $USER_ID
 * @property string $USER_NAME
 * @property int $USER_TYPE
 * @property string $SURNAME
 * @property string $OTHER_NAMES
 * @property int $MOBILE
 * @property string $EMAIL
 * @property int $LOCATION_ID
 * @property string $PASSWORD
 * @property string $DATE_REGISTERED
 * @property string $LAST_UPDATED
 * @property string $CLIENT_TOKEN
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'USER_NAME', 'USER_TYPE', 'SURNAME', 'OTHER_NAMES', 'MOBILE', 'EMAIL', 'LOCATION_ID', 'PASSWORD'], 'required'],
            [['USER_ID', 'USER_TYPE', 'MOBILE', 'LOCATION_ID'], 'integer'],
            [['DATE_REGISTERED', 'LAST_UPDATED'], 'safe'],
            [['USER_NAME', 'SURNAME', 'OTHER_NAMES', 'EMAIL', 'PASSWORD'], 'string', 'max' => 100],
            [['CLIENT_TOKEN'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => 'User  ID',
            'USER_NAME' => 'User  Name',
            'USER_TYPE' => 'User  Type',
            'SURNAME' => 'Surname',
            'OTHER_NAMES' => 'Other  Names',
            'MOBILE' => 'Mobile',
            'EMAIL' => 'Email',
            'LOCATION_ID' => 'Location  ID',
            'PASSWORD' => 'Password',
            'DATE_REGISTERED' => 'Date  Registered',
            'LAST_UPDATED' => 'Last  Updated',
            'CLIENT_TOKEN' => 'Client  Token',
        ];
    }
}
