<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu_item_type".
 *
 * @property int $ITEM_TYPE_ID
 * @property int $MENU_ITEM_ID
 * @property string $PRICE
 * @property string $ITEM_TYPE_NAME
 * @property string $DESCRIPTION
 * @property int $AVAILABLE
 *
 * @property CustomerOrderItem[] $customerOrderItems
 * @property MenuItem $mENUITEM
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
            [['MENU_ITEM_ID', 'PRICE', 'ITEM_TYPE_NAME'], 'required'],
            [['MENU_ITEM_ID', 'AVAILABLE'], 'integer'],
            [['PRICE'], 'number'],
            [['ITEM_TYPE_NAME'], 'string', 'max' => 50],
            [['DESCRIPTION'], 'string', 'max' => 255],
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
            'PRICE' => 'Price',
            'ITEM_TYPE_NAME' => 'Item  Type  Name',
            'DESCRIPTION' => 'Description',
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
}
