<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chef".
 *
 * @property int $CHEF_ID
 * @property string $CHEF_NAME
 * @property int $KITCHEN_ID
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
            [['CHEF_ID', 'CHEF_NAME', 'KITCHEN_ID'], 'required'],
            [['CHEF_ID', 'KITCHEN_ID'], 'integer'],
            [['CHEF_NAME'], 'string', 'max' => 100],
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
}
