<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wp_cart".
 *
 * @property int $CART_ITEM_ID
 * @property string $CART_GUID
 * @property int $ITEM_TYPE_ID
 * @property int $QUANTITY
 * @property string $ITEM_PRICE
 * @property string $ITEM_TYPE_SIZE
 *
 * @property MenuItemType $iTEMTYPE
 */
class WpCart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wp_cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CART_GUID'], 'string'],
            [['ITEM_TYPE_ID', 'QUANTITY', 'ITEM_PRICE', 'ITEM_TYPE_SIZE'], 'required'],
            [['ITEM_TYPE_ID', 'QUANTITY'], 'integer'],
            [['ITEM_PRICE'], 'number'],
            [['ITEM_TYPE_SIZE'], 'string', 'max' => 15],
            [['ITEM_TYPE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => MenuItemType::className(), 'targetAttribute' => ['ITEM_TYPE_ID' => 'ITEM_TYPE_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CART_ITEM_ID' => 'C A R T I T E M I D',
            'CART_GUID' => 'C A R T G U I D',
            'ITEM_TYPE_ID' => 'I T E M T Y P E I D',
            'QUANTITY' => 'Q U A N T I T Y',
            'ITEM_PRICE' => 'I T E M P R I C E',
            'ITEM_TYPE_SIZE' => 'I T E M T Y P E S I Z E',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getITEMTYPE()
    {
        return $this->hasOne(MenuItemType::className(), ['ITEM_TYPE_ID' => 'ITEM_TYPE_ID']);
    }
}
