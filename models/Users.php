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
 *
 * @property Order[] $orders
 * @property Location $lOCATION
 * @property UserType $uSERTYPE
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
            [['USER_NAME', 'USER_TYPE', 'SURNAME', 'OTHER_NAMES', 'MOBILE', 'EMAIL', 'LOCATION_ID', 'PASSWORD'], 'required'],
            [['USER_TYPE', 'MOBILE', 'LOCATION_ID'], 'integer'],
            [['DATE_REGISTERED', 'LAST_UPDATED'], 'safe'],
            [['USER_NAME', 'SURNAME', 'OTHER_NAMES', 'EMAIL', 'PASSWORD'], 'string', 'max' => 100],
            [['CLIENT_TOKEN'], 'string', 'max' => 255],
            [['LOCATION_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['LOCATION_ID' => 'LOCATION_ID']],
            [['USER_TYPE'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['USER_TYPE' => 'USER_TYPE_ID']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLOCATION()
    {
        return $this->hasOne(Location::className(), ['LOCATION_ID' => 'LOCATION_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSERTYPE()
    {
        return $this->hasOne(UserType::className(), ['USER_TYPE_ID' => 'USER_TYPE']);
    }
}
