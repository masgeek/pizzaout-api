<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_item_type".
 *
 * @property int $ITEM_TYPE_ID
 * @property int $MENU_ITEM_ID
 * @property string $ITEM_TYPE_SIZE
 * @property string $PRICE
 * @property bool $AVAILABLE
 */
class MenuItemType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu_item_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ITEM_TYPE_ID', 'MENU_ITEM_ID', 'ITEM_TYPE_SIZE', 'PRICE'], 'required'],
            [['ITEM_TYPE_ID', 'MENU_ITEM_ID'], 'integer'],
            [['PRICE'], 'number'],
            [['AVAILABLE'], 'boolean'],
            [['ITEM_TYPE_SIZE'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ITEM_TYPE_ID' => 'Item  Type  ID',
            'MENU_ITEM_ID' => 'Menu  Item  ID',
            'ITEM_TYPE_SIZE' => 'Item  Type  Size',
            'PRICE' => 'Price',
            'AVAILABLE' => 'Available',
        ];
    }
}
