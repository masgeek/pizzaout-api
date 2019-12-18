<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "{{%delivery_time}}".
 *
 * @property int $TIME_ID
 * @property string $DELIVERY_TIME
 */
class DeliveryTime extends \app\common\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%delivery_time}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DELIVERY_TIME'], 'required'],
            [['DELIVERY_TIME'], 'string', 'max' => 20],
            [['DELIVERY_TIME'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'TIME_ID' => Yii::t('app', 'Time ID'),
            'DELIVERY_TIME' => Yii::t('app', 'Delivery Time'),
        ];
    }
}
