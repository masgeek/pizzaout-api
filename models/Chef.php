<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chef".
 *
 * @property int $CHEF_ID
 * @property string $CHEF_NAME
 * @property int $KITCHEN_ID
 *
 * @property Kitchen $kITCHEN
 * @property CustomerOrder[] $customerOrders
 */
class Chef extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chef';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CHEF_NAME', 'KITCHEN_ID'], 'required'],
            [['KITCHEN_ID'], 'integer'],
            [['CHEF_NAME'], 'string', 'max' => 100],
            [['KITCHEN_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Kitchen::className(), 'targetAttribute' => ['KITCHEN_ID' => 'KITCHEN_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CHEF_ID' => 'Chef  ID',
            'CHEF_NAME' => 'Chef  Name',
            'KITCHEN_ID' => 'Kitchen  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKITCHEN()
    {
        return $this->hasOne(Kitchen::className(), ['KITCHEN_ID' => 'KITCHEN_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrders()
    {
        return $this->hasMany(CustomerOrder::className(), ['CHEF_ID' => 'CHEF_ID']);
    }
}
