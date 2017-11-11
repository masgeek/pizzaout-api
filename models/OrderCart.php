<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_cart".
 *
 * @property int $cart_item_id
 */
class OrderCart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cart_item_id' => 'Cart Item ID',
        ];
    }
}
