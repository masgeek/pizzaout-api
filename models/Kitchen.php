<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kitchen".
 *
 * @property string $Kitchen_ID
 * @property string $Kitchen_Name
 * @property string $City_ID
 *
 * @property Chef[] $chefs
 * @property City $city
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
            [['Kitchen_Name', 'City_ID'], 'required'],
            [['City_ID'], 'integer'],
            [['Kitchen_Name'], 'string', 'max' => 100],
            [['City_ID'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['City_ID' => 'City_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Kitchen_ID' => 'Kitchen  ID',
            'Kitchen_Name' => 'Kitchen  Name',
            'City_ID' => 'City  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChefs()
    {
        return $this->hasMany(Chef::className(), ['Kitchen_ID' => 'Kitchen_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['City_ID' => 'City_ID']);
    }
}
