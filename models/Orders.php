<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property string $Order_ID
 * @property string $User_ID
 * @property string $Location_ID
 *
 * @property Users $user
 * @property Locations $location
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['User_ID', 'Location_ID'], 'required'],
            [['User_ID', 'Location_ID'], 'integer'],
            [['User_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['User_ID' => 'User_ID']],
            [['Location_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Locations::className(), 'targetAttribute' => ['Location_ID' => 'Location_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Order_ID' => 'Order  ID',
            'User_ID' => 'User  ID',
            'Location_ID' => 'Location  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['User_ID' => 'User_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Locations::className(), ['Location_ID' => 'Location_ID']);
    }
}
