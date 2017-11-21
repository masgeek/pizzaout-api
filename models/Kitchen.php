<?php

namespace app\models;

/**
 * This is the model class for table "kitchen".
 *
 * @property string $KITCHEN_ID
 * @property string $KITCHEN_NAME
 * @property string $CITY_ID
 * @property string $OPENING_TIME
 * @property string $CLOSING_TIME
 * @property string $ADDRESS
 *
 * @property Chef[] $chefs
 * @property CustomerOrder[] $customerOrders
 * @property City $cITY
 * @property Riders[] $riders
 */
class Kitchen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kitchen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KITCHEN_NAME', 'CITY_ID'], 'required'],
            [['CITY_ID'], 'integer'],
            [['OPENING_TIME', 'CLOSING_TIME'], 'safe'],
            [['ADDRESS'], 'string'],
            [['KITCHEN_NAME'], 'string', 'max' => 100],
            [['CITY_ID'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['CITY_ID' => 'CITY_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'KITCHEN_ID' => 'Kitchen  ID',
            'KITCHEN_NAME' => 'Kitchen  Name',
            'CITY_ID' => 'City  ID',
            'OPENING_TIME' => 'Opening  Time',
            'CLOSING_TIME' => 'Closing  Time',
            'ADDRESS' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChefs()
    {
        return $this->hasMany(Chef::className(), ['KITCHEN_ID' => 'KITCHEN_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrders()
    {
        return $this->hasMany(CustomerOrder::className(), ['KITCHEN_ID' => 'KITCHEN_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCITY()
    {
        return $this->hasOne(City::className(), ['CITY_ID' => 'CITY_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRiders()
    {
        return $this->hasMany(Riders::className(), ['KITCHEN_ID' => 'KITCHEN_ID']);
    }
}
