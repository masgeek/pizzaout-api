<?php

namespace app\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "payment".
 *
 * @property int $PAYMENT_ID
 * @property int $ORDER_ID
 * @property string $PAYMENT_CHANNEL
 * @property string $PAYMENT_AMOUNT
 * @property string $PAYMENT_REF
 * @property string $PAYMENT_STATUS
 * @property string $PAYMENT_DATE
 * @property string $PAYMENT_NOTES
 * @property string $PAYMENT_NUMBER
 *
 * @property Status $pAYMENTSTATUS
 * @property CustomerOrder $oRDER
 */
class Payment extends \app\models\base\Payment
{

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'PAYMENT_DATE',
                'updatedAtAttribute' => 'UPDATED_AT',
            ],
            'blameable' => [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'CREATED_BY',
                'updatedByAttribute' => 'UPDATED_BY',
            ],
//            'slug' => [
//                'class' => Slu::class,
//                // 'attribute' => ['name', 'language.username'],
//                'attribute' => 'id',
//                'slugAttribute' => 'slug',
//                'ensureUnique' => true,
//                'replacement' => '-',
//                'lowercase' => true,
//                'immutable' => false
//            ],
        ];
    }

    public function rules()
    {
        $rules = parent::rules();
//        $rules[] = [['PAYMENT_NUMBER', 'ORDER_ID', 'PAYMENT_STATUS'], 'required'];
        return $rules;
    }

    public function generateUuid()
    {
        $this->PAYMENT_REF = parent::generateUuid();
    }
}
