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
 * @property string $NOTES
 * @property int $CART_TIMESTAMP
 * @property string $CREATED_AT
 * @property string $UPDATED_AT
 *
 * @property MenuItemType $iTEMTYPE
 * @property Users $uSER
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
            [['USER_ID', 'ITEM_TYPE_ID', 'QUANTITY', 'ITEM_PRICE', 'ITEM_TYPE_SIZE'], 'required'],
            [['USER_ID', 'ITEM_TYPE_ID', 'QUANTITY', 'CART_TIMESTAMP'], 'integer'],
            [['ITEM_PRICE'], 'number'],
            [['CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['ITEM_TYPE_SIZE'], 'string', 'max' => 15],
            [['NOTES'], 'string', 'max' => 255],
            [['ITEM_TYPE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => MenuItemType::className(), 'targetAttribute' => ['ITEM_TYPE_ID' => 'ITEM_TYPE_ID']],
            [['USER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['USER_ID' => 'USER_ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CART_ITEM_ID' => Yii::t('app', 'Cart  Item  ID'),
            'USER_ID' => Yii::t('app', 'User  ID'),
            'ITEM_TYPE_ID' => Yii::t('app', 'Item  Type  ID'),
            'QUANTITY' => Yii::t('app', 'Quantity'),
            'ITEM_PRICE' => Yii::t('app', 'Item  Price'),
            'ITEM_TYPE_SIZE' => Yii::t('app', 'Item  Type  Size'),
            'NOTES' => Yii::t('app', 'Notes'),
            'CART_TIMESTAMP' => Yii::t('app', 'Cart  Timestamp'),
            'CREATED_AT' => Yii::t('app', 'Created  At'),
            'UPDATED_AT' => Yii::t('app', 'Updated  At'),
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
    public function getUSER()
    {
        return $this->hasOne(Users::className(), ['USER_ID' => 'USER_ID']);
    }
}
