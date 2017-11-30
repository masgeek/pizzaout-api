<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%favs}}".
 *
 * @property int $FAV_ID
 * @property int $MENU_ITEM_ID
 * @property int $USER_ID
 */
class Favs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%favs}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FAV_ID'], 'required'],
            [['FAV_ID', 'MENU_ITEM_ID', 'USER_ID'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FAV_ID' => 'Fav  ID',
            'MENU_ITEM_ID' => 'Menu  Item  ID',
            'USER_ID' => 'User  ID',
        ];
    }
}
