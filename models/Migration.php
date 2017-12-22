<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_migration".
 *
 * @property string $version
 * @property int $apply_time
 */
class Migration extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tb_migration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['version'], 'required'],
            [['apply_time'], 'integer'],
            [['version'], 'string', 'max' => 180],
            [['version'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'version' => 'Version',
            'apply_time' => 'Apply Time',
        ];
    }
}
