<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_item".
 *
 * @property int $ORDER_ITEM_ID
 * @property int $ORDER_ID
 * @property int $MENU_ITEM_ID
 * @property int $QUANTITY
 * @property string $PRICE
 * @property string $SUBTOTAL
 * @property string $OPTIONS
 * @property string $NOTES
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 *
 * @property MenuItem $mENUITEM
 * @property Order $oRDER
 */
class OrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'MENU_ITEM_ID', 'QUANTITY', 'PRICE', 'SUBTOTAL', 'OPTIONS', 'NOTES', 'CREATED_AT'], 'required'],
            [['ORDER_ID', 'MENU_ITEM_ID', 'QUANTITY'], 'integer'],
            [['PRICE', 'SUBTOTAL'], 'number'],
            [['CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['OPTIONS'], 'string', 'max' => 100],
            [['NOTES'], 'string', 'max' => 200],
            [['MENU_ITEM_ID'], 'exist', 'skipOnError' => true, 'targetClass' => MenuItem::className(), 'targetAttribute' => ['MENU_ITEM_ID' => 'MENU_ITEM_ID']],
            [['ORDER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['ORDER_ID' => 'ORDER_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ORDER_ITEM_ID' => 'Order  Item  ID',
            'ORDER_ID' => 'Order  ID',
            'MENU_ITEM_ID' => 'Menu  Item  ID',
            'QUANTITY' => 'Quantity',
            'PRICE' => 'Price',
            'SUBTOTAL' => 'Subtotal',
            'OPTIONS' => 'Options',
            'NOTES' => 'Notes',
            'CREATED_AT' => 'Created  At',
            'UPDATED_AT' => 'Updated  At',
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
    public function getORDER()
    {
        return $this->hasOne(Order::className(), ['ORDER_ID' => 'ORDER_ID']);
    }
}
