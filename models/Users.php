<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%users}}".
 *
 * @property string $USER_ID
 * @property string $USER_NAME
 * @property string $USER_TYPE
 * @property string $SURNAME
 * @property string $OTHER_NAMES
 * @property string $MOBILE
 * @property string $EMAIL
 * @property string $LOCATION_ID
 * @property string $PASSWORD
 * @property string $DATE_REGISTERED
 * @property string $LAST_UPDATED
 * @property string $CLIENT_TOKEN
 * @property string $RESET_TOKEN
 * @property bool $USER_STATUS Indicate if user is active or not
 * @property string $TOKEN_EXPPIRY
 *
 * @property ApiToken[] $apiTokens
 * @property CustomerOrder[] $customerOrders
 * @property Riders[] $riders
 * @property Cart[] $carts
 * @property Favs[] $favs
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
            [['USER_NAME', 'USER_TYPE', 'SURNAME', 'OTHER_NAMES', 'MOBILE', 'EMAIL', 'PASSWORD', 'RESET_TOKEN'], 'required'],
            [['USER_TYPE', 'LOCATION_ID'], 'integer'],
            [['DATE_REGISTERED', 'LAST_UPDATED', 'TOKEN_EXPPIRY'], 'safe'],
            [['USER_STATUS'], 'boolean'],
            [['USER_NAME', 'SURNAME', 'OTHER_NAMES', 'EMAIL', 'PASSWORD', 'RESET_TOKEN'], 'string', 'max' => 100],
            [['MOBILE'], 'string', 'max' => 25],
            [['CLIENT_TOKEN'], 'string', 'max' => 255],
            [['USER_NAME'], 'unique'],
            [['EMAIL'], 'unique'],
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
            'RESET_TOKEN' => 'Reset  Token',
            'USER_STATUS' => 'Indicate if user is active or not',
            'TOKEN_EXPPIRY' => 'Token  Exppiry',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApiTokens()
    {
        return $this->hasMany(ApiToken::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrders()
    {
        return $this->hasMany(CustomerOrder::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiders()
    {
        return $this->hasMany(Riders::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavs()
    {
        return $this->hasMany(Favs::className(), ['USER_ID' => 'USER_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSERTYPE()
    {
        return $this->hasOne(UserType::className(), ['USER_TYPE_ID' => 'USER_TYPE']);
    }
}
