<?php


namespace app\common;


use thamtech\uuid\helpers\UuidHelper;
use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord
{
    public function generateUuid()
    {
        $uuid = UuidHelper::uuid();
        return $uuid;
    }
}