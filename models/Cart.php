<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%cart}}".
 *
 * @property int $CART_ITEM_ID
 * @property int $USER_ID
 * @property int $ITEM_TYPE_ID
 * @property int $QUANTITY
 * @property string $ITEM_PRICE
 * @property string $ITEM_TYPE_SIZE
 * @property int $CART_TIMESTAMP
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 */
class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cart}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CART_ITEM_ID', 'USER_ID', 'ITEM_TYPE_ID', 'QUANTITY', 'ITEM_PRICE', 'ITEM_TYPE_SIZE'], 'required'],
            [['CART_ITEM_ID', 'USER_ID', 'ITEM_TYPE_ID', 'QUANTITY', 'CART_TIMESTAMP'], 'integer'],
            [['ITEM_PRICE'], 'number'],
            [['CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['ITEM_TYPE_SIZE'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CART_ITEM_ID' => 'Cart  Item  ID',
            'USER_ID' => 'User  ID',
            'ITEM_TYPE_ID' => 'Item  Type  ID',
            'QUANTITY' => 'Quantity',
            'ITEM_PRICE' => 'Item  Price',
            'ITEM_TYPE_SIZE' => 'Item  Type  Size',
            'CART_TIMESTAMP' => 'Cart  Timestamp',
            'CREATED_AT' => 'Created  At',
            'UPDATED_AT' => 'Updated  At',
        ];
    }
}
