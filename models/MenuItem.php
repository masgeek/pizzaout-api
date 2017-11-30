<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_item".
 *
 * @property int $MENU_ITEM_ID
 * @property int $MENU_CAT_ID
 * @property string $MENU_ITEM_NAME
 * @property string $MENU_ITEM_DESC
 * @property string $MENU_ITEM_IMAGE
 * @property bool $HOT_DEAL
 * @property bool $VEGETARIAN
 * @property int $MAX_QTY Show the maximum number of quantities one can select from
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
            [['MENU_ITEM_ID', 'MENU_CAT_ID', 'MENU_ITEM_NAME', 'MENU_ITEM_DESC', 'MENU_ITEM_IMAGE'], 'required'],
            [['MENU_ITEM_ID', 'MENU_CAT_ID', 'MAX_QTY'], 'integer'],
            [['MENU_ITEM_DESC'], 'string'],
            [['HOT_DEAL', 'VEGETARIAN'], 'boolean'],
            [['MENU_ITEM_NAME', 'MENU_ITEM_IMAGE'], 'string', 'max' => 255],
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
            'MENU_ITEM_DESC' => 'Menu  Item  Desc',
            'MENU_ITEM_IMAGE' => 'Menu  Item  Image',
            'HOT_DEAL' => 'Hot  Deal',
            'VEGETARIAN' => 'Vegetarian',
            'MAX_QTY' => 'Show the maximum number of quantities one can select from',
        ];
    }
}
