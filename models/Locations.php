<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "locations".
 *
 * @property string $Location_ID
 * @property string $Location_Name
 *
 * @property Orders[] $orders
 * @property Users[] $users
 */
class Locations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'locations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Location_Name'], 'required'],
            [['Location_Name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Location_ID' => 'Location  ID',
            'Location_Name' => 'Location  Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['Location_ID' => 'Location_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['Location_ID' => 'Location_ID']);
    }
}
