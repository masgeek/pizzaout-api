<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $User_ID
 * @property string $Surname
 * @property string $Other_Names
 * @property int $Mobile
 * @property string $Email
 * @property string $Location_ID
 * @property string $User_Name
 * @property string $Password
 * @property string $User_Type
 *
 * @property Orders[] $orders
 * @property Locations $location
 * @property UserType $userType
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Surname', 'Other_Names', 'Mobile', 'Email', 'Location_ID', 'User_Name', 'Password', 'User_Type'], 'required'],
            [['Mobile', 'Location_ID', 'User_Type'], 'integer'],
            [['Surname', 'Other_Names', 'Email', 'User_Name', 'Password'], 'string', 'max' => 100],
            [['Location_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::className(), 'targetAttribute' => ['Location_ID' => 'Location_ID']],
            [['User_Type'], 'exist', 'skipOnError' => true, 'targetClass' => UserType::className(), 'targetAttribute' => ['User_Type' => 'Type_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'User_ID' => 'User  ID',
            'Surname' => 'Surname',
            'Other_Names' => 'Other  Names',
            'Mobile' => 'Mobile',
            'Email' => 'Email',
            'Location_ID' => 'Location  ID',
            'User_Name' => 'User  Name',
            'Password' => 'Password',
            'User_Type' => 'User  Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['User_ID' => 'User_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Locations::className(), ['Location_ID' => 'Location_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['Type_ID' => 'User_Type']);
    }
}
