<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vw_order_items".
 *
 * @property string $ORDER_ID
 * @property int $QUANTITY
 * @property string $PRICE
 * @property string $SUBTOTAL
 * @property string $ITEM_TYPE_SIZE
 * @property string $MENU_ITEM_NAME
 * @property string $MENU_CAT_NAME
 * @property string $MENU_CAT_IMAGE
 * @property string $MENU_ITEM_IMAGE
 * @property string $USER_ID
 */
class VwOrderItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vw_order_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'QUANTITY', 'USER_ID'], 'integer'],
            [['QUANTITY', 'PRICE', 'SUBTOTAL', 'MENU_ITEM_NAME', 'MENU_CAT_NAME', 'MENU_ITEM_IMAGE', 'USER_ID'], 'required'],
            [['PRICE', 'SUBTOTAL'], 'number'],
            [['ITEM_TYPE_SIZE'], 'string', 'max' => 15],
            [['MENU_ITEM_NAME', 'MENU_CAT_IMAGE', 'MENU_ITEM_IMAGE'], 'string', 'max' => 255],
            [['MENU_CAT_NAME'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ORDER_ID' => 'Order  ID',
            'QUANTITY' => 'Quantity',
            'PRICE' => 'Price',
            'SUBTOTAL' => 'Subtotal',
            'ITEM_TYPE_SIZE' => 'Item  Type  Size',
            'MENU_ITEM_NAME' => 'Menu  Item  Name',
            'MENU_CAT_NAME' => 'Menu  Cat  Name',
            'MENU_CAT_IMAGE' => 'Menu  Cat  Image',
            'MENU_ITEM_IMAGE' => 'Menu  Item  Image',
            'USER_ID' => 'User  ID',
        ];
    }
}
