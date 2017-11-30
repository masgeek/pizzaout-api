<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_order_item".
 *
 * @property int $ORDER_ITEM_ID
 * @property int $ORDER_ID
 * @property int $ITEM_TYPE_ID
 * @property int $QUANTITY
 * @property string $PRICE
 * @property string $SUBTOTAL
 * @property string $OPTIONS
 * @property string $NOTES
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 */
class CustomerOrderItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer_order_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ITEM_ID', 'ORDER_ID', 'ITEM_TYPE_ID', 'QUANTITY', 'PRICE', 'SUBTOTAL', 'CREATED_AT'], 'required'],
            [['ORDER_ITEM_ID', 'ORDER_ID', 'ITEM_TYPE_ID', 'QUANTITY'], 'integer'],
            [['PRICE', 'SUBTOTAL'], 'number'],
            [['CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['OPTIONS'], 'string', 'max' => 100],
            [['NOTES'], 'string', 'max' => 200],
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
            'ITEM_TYPE_ID' => 'Item  Type  ID',
            'QUANTITY' => 'Quantity',
            'PRICE' => 'Price',
            'SUBTOTAL' => 'Subtotal',
            'OPTIONS' => 'Options',
            'NOTES' => 'Notes',
            'CREATED_AT' => 'Created  At',
            'UPDATED_AT' => 'Updated  At',
        ];
    }
}
