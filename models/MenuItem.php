<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_item".
 *
 * @property int $MENU_ITEM_ID
 * @property int $MENU_CAT_ID
 * @property string $MENU_ITEM_NAME
 * @property string $MENU_ITEM_PRICE
 * @property string $MENU_ITEM_DESC
 * @property string $MENU_ITEM_IMAGE
 * @property int $HOT_DEAL
 *
 * @property ItemType[] $itemTypes
 * @property MenuCategory $mENUCAT
 */
class MenuItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MENU_CAT_ID', 'MENU_ITEM_NAME', 'MENU_ITEM_PRICE', 'MENU_ITEM_DESC', 'MENU_ITEM_IMAGE'], 'required'],
            [['MENU_CAT_ID', 'HOT_DEAL'], 'integer'],
            [['MENU_ITEM_PRICE'], 'number'],
            [['MENU_ITEM_NAME', 'MENU_ITEM_DESC', 'MENU_ITEM_IMAGE'], 'string', 'max' => 255],
            [['MENU_CAT_ID'], 'exist', 'skipOnError' => true, 'targetClass' => MenuCategory::className(), 'targetAttribute' => ['MENU_CAT_ID' => 'MENU_CAT_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MENU_ITEM_ID' => 'Menu  Item  ID',
            'MENU_CAT_ID' => 'Menu  Cat  ID',
            'MENU_ITEM_NAME' => 'Menu  Item  Name',
            'MENU_ITEM_PRICE' => 'Menu  Item  Price',
            'MENU_ITEM_DESC' => 'Menu  Item  Desc',
            'MENU_ITEM_IMAGE' => 'Menu  Item  Image',
            'HOT_DEAL' => 'Hot  Deal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemTypes()
    {
        return $this->hasMany(ItemType::className(), ['MENU_ITEM_ID' => 'MENU_ITEM_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMENUCAT()
    {
        return $this->hasOne(MenuCategory::className(), ['MENU_CAT_ID' => 'MENU_CAT_ID']);
    }
}
