<?php

namespace app\models;

/**
 * This is the model class for table "{{%favs}}".
 *
 * @property string $FAV_ID
 * @property string $MENU_ITEM_ID
 * @property string $USER_ID
 *
 * @property MenuItem $mENUITEM
 * @property Users $uSER
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
            [['MENU_ITEM_ID', 'USER_ID'], 'integer'],
            [['MENU_ITEM_ID'], 'exist', 'skipOnError' => true, 'targetClass' => MenuItem::className(), 'targetAttribute' => ['MENU_ITEM_ID' => 'MENU_ITEM_ID']],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMENUITEM()
    {
        return $this->hasOne(MenuItem::className(), ['MENU_ITEM_ID' => 'MENU_ITEM_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUSER()
    {
        return $this->hasOne(Users::className(), ['USER_ID' => 'USER_ID']);
    }
}
