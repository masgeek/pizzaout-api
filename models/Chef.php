<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chef".
 *
 * @property string $Chef_ID
 * @property string $Chef_Name
 * @property string $Kitchen_ID
 *
 * @property Kitchen $kitchen
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
            [['Chef_Name', 'Kitchen_ID'], 'required'],
            [['Kitchen_ID'], 'integer'],
            [['Chef_Name'], 'string', 'max' => 100],
            [['Kitchen_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Kitchen::className(), 'targetAttribute' => ['Kitchen_ID' => 'Kitchen_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Chef_ID' => 'Chef  ID',
            'Chef_Name' => 'Chef  Name',
            'Kitchen_ID' => 'Kitchen  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKitchen()
    {
        return $this->hasOne(Kitchen::className(), ['Kitchen_ID' => 'Kitchen_ID']);
    }
}
