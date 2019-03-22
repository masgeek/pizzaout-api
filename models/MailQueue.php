<?php

namespace app\models;

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
            'mail_id' => 'Mail ID',
            'receipent' => 'Receipent',
            'subject' => 'Subject',
            'body' => 'Body',
            'sent' => 'Sent',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
