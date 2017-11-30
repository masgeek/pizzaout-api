<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%status}}".
 *
 * @property string $STATUS_NAME
 * @property string $STATUS_DESC
 * @property string $COLOR
 * @property string $SCOPE
 * @property int $RANK
 * @property int $WORKFLOW
 */
class Status extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%status}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS_NAME'], 'required'],
            [['RANK', 'WORKFLOW'], 'integer'],
            [['STATUS_NAME'], 'string', 'max' => 30],
            [['STATUS_DESC'], 'string', 'max' => 100],
            [['COLOR', 'SCOPE'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STATUS_NAME' => 'Status  Name',
            'STATUS_DESC' => 'Status  Desc',
            'COLOR' => 'Color',
            'SCOPE' => 'Scope',
            'RANK' => 'Rank',
            'WORKFLOW' => 'Workflow',
        ];
    }
}
