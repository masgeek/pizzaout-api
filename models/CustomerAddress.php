<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_address".
 *
 * @property int $ADDRESS_ID
 * @property int $USER_ID
 * @property int $LOCATION_ID
 * @property string $ADDRESS
 *
 * @property Users $uSER
 * @property Location $lOCATION
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
            'ADDRESS_ID' => Yii::t('app', 'Address  ID'),
            'USER_ID' => Yii::t('app', 'User  ID'),
            'LOCATION_ID' => Yii::t('app', 'Location  ID'),
            'ADDRESS' => Yii::t('app', 'Address'),
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
}
