<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "db_cache".
 *
 * @property string $id
 * @property int $expire
 * @property resource $data
 */
class DbCache extends \app\common\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'db_cache';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['expire'], 'integer'],
            [['data'], 'string'],
            [['id'], 'string', 'max' => 128],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'expire' => Yii::t('app', 'Expire'),
            'data' => Yii::t('app', 'Data'),
        ];
    }
}
