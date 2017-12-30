<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "my_session".
 *
 * @property string $id
 * @property int $expire
 * @property resource $data
 * @property int $user_id
 * @property string $user_name
 */
class MySession extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'my_session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['expire', 'user_id'], 'integer'],
            [['data'], 'string'],
            [['id'], 'string', 'max' => 60],
            [['user_name'], 'string', 'max' => 20],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'expire' => Yii::t('app', 'Expire'),
            'data' => Yii::t('app', 'Data'),
            'user_id' => Yii::t('app', 'User ID'),
            'user_name' => Yii::t('app', 'User Name'),
        ];
    }
}
