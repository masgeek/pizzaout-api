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
 *
 * @property CustomerOrderItem[] $customerOrderItems
 * @property MenuItem $mENUITEM
 * @property Cart[] $carts
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
            [['MENU_ITEM_ID', 'ITEM_TYPE_SIZE', 'PRICE'], 'required'],
            [['MENU_ITEM_ID'], 'integer'],
            [['PRICE'], 'number'],
            [['AVAILABLE'], 'boolean'],
            [['ITEM_TYPE_SIZE'], 'string', 'max' => 15],
            [['MENU_ITEM_ID'], 'exist', 'skipOnError' => true, 'targetClass' => MenuItem::className(), 'targetAttribute' => ['MENU_ITEM_ID' => 'MENU_ITEM_ID']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerOrderItems()
    {
        return $this->hasMany(CustomerOrderItem::className(), ['ITEM_TYPE_ID' => 'ITEM_TYPE_ID']);
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
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['ITEM_TYPE_ID' => 'ITEM_TYPE_ID']);
    }
}
