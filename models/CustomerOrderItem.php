<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer_order_item".
 *
 * @property int $ORDER_ITEM_ID
 * @property string $ORDER_ID
 * @property string $ITEM_TYPE_ID
 * @property int $QUANTITY
 * @property string $PRICE
 * @property string $SUBTOTAL
 * @property string $OPTIONS
 * @property string $NOTES
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 *
 * @property MenuItemType $iTEMTYPE
 * @property CustomerOrder $oRDER
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
            [['ORDER_ID', 'ITEM_TYPE_ID', 'QUANTITY', 'PRICE', 'SUBTOTAL', 'CREATED_AT'], 'required'],
            [['ORDER_ID', 'ITEM_TYPE_ID', 'QUANTITY'], 'integer'],
            [['PRICE', 'SUBTOTAL'], 'number'],
            [['CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['OPTIONS'], 'string', 'max' => 100],
            [['NOTES'], 'string', 'max' => 200],
            [['ITEM_TYPE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => MenuItemType::className(), 'targetAttribute' => ['ITEM_TYPE_ID' => 'ITEM_TYPE_ID']],
            [['ORDER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => CustomerOrder::className(), 'targetAttribute' => ['ORDER_ID' => 'ORDER_ID']],
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getITEMTYPE()
    {
        return $this->hasOne(MenuItemType::className(), ['ITEM_TYPE_ID' => 'ITEM_TYPE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getORDER()
    {
        return $this->hasOne(CustomerOrder::className(), ['ORDER_ID' => 'ORDER_ID']);
    }
}
