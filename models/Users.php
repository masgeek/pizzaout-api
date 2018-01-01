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
            [['USER_NAME', 'USER_TYPE', 'SURNAME', 'OTHER_NAMES', 'MOBILE', 'EMAIL', 'PASSWORD'], 'required'],
            [['USER_TYPE', 'MOBILE', 'LOCATION_ID'], 'integer'],
            [['DATE_REGISTERED', 'LAST_UPDATED'], 'safe'],
            [['USER_NAME', 'SURNAME', 'OTHER_NAMES', 'EMAIL', 'PASSWORD'], 'string', 'max' => 100],
            [['CLIENT_TOKEN'], 'string', 'max' => 255],
            [['USER_TYPE'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['USER_TYPE' => 'USER_TYPE_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User  ID'),
            'USER_NAME' => Yii::t('app', 'User  Name'),
            'USER_TYPE' => Yii::t('app', 'User  Type'),
            'SURNAME' => Yii::t('app', 'Surname'),
            'OTHER_NAMES' => Yii::t('app', 'Other  Names'),
            'MOBILE' => Yii::t('app', 'Mobile'),
            'EMAIL' => Yii::t('app', 'Email'),
            'LOCATION_ID' => Yii::t('app', 'Location  ID'),
            'PASSWORD' => Yii::t('app', 'Password'),
            'DATE_REGISTERED' => Yii::t('app', 'Date  Registered'),
            'LAST_UPDATED' => Yii::t('app', 'Last  Updated'),
            'CLIENT_TOKEN' => Yii::t('app', 'Client  Token'),
        ];
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
