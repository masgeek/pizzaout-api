<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "mail_queue".
 *
 * @property int $mail_id
 * @property string $receipent
 * @property string $subject
 * @property string $body
 * @property bool $sent
 * @property string $type
 * @property string $created_at
 * @property string $updated_at
 */
class MailQueue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_queue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subject', 'body'], 'string'],
            [['sent'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
            [['receipent'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'mail_id' => Yii::t('app', 'Mail ID'),
            'receipent' => Yii::t('app', 'Receipent'),
            'subject' => Yii::t('app', 'Subject'),
            'body' => Yii::t('app', 'Body'),
            'sent' => Yii::t('app', 'Sent'),
            'type' => Yii::t('app', 'Type'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
