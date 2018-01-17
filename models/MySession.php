<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "my_session".
 *
 * @property string $id
 * @property int $expire
 * @property resource $data
 * @property string $user_id
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
            'id' => 'ID',
            'expire' => 'Expire',
            'data' => 'Data',
            'user_id' => 'User ID',
            'user_name' => 'User Name',
        ];
    }
}
