<?php

namespace app\models\base;

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
            'CART_ITEM_ID' => Yii::t('app', 'Cart Item ID'),
            'CART_GUID' => Yii::t('app', 'Cart Guid'),
            'ITEM_TYPE_ID' => Yii::t('app', 'Item Type ID'),
            'QUANTITY' => Yii::t('app', 'Quantity'),
            'ITEM_PRICE' => Yii::t('app', 'Item Price'),
            'ITEM_TYPE_SIZE' => Yii::t('app', 'Item Type Size'),
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
