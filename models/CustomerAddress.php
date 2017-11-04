<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_address".
 *
 * @property string $ADDRESS_ID
 * @property string $USER_ID
 * @property string $LOCATION_ID
 * @property string $ADDRESS
 *
 * @property Users $uSER
 * @property Location $lOCATION
 * @property CustomerOrder[] $customerOrders
 */
class CustomerAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'ADDRESS'], 'required'],
            [['USER_ID', 'LOCATION_ID'], 'integer'],
            [['ADDRESS'], 'string'],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
            [['LOCATION_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['LOCATION_ID' => 'LOCATION_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ADDRESS_ID' => 'Address  ID',
            'USER_ID' => 'User  ID',
            'LOCATION_ID' => 'Location  ID',
            'ADDRESS' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(Users::className(), ['USER_ID' => 'USER_ID']);
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
    public function getCustomerOrders()
    {
        return $this->hasMany(CustomerOrder::className(), ['ADDRESS_ID' => 'ADDRESS_ID']);
    }
}
