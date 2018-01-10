<?php
/**
 * Created by PhpStorm.
 * User: masgeek
 * Date: 10-Jan-18
 * Time: 14:18
 */

namespace app\model_extended;


use app\models\UserType;

class USER_TYPE_MODEL extends UserType
{
    /**
     * @param array $excludeList
     * @return array
     */
    public static function GetUserTypes(array $excludeList = ['ADMIN', 'RIDER'])
    {
        $userType = self::find()
            ->where(['NOT IN', 'USER_TYPE_NAME', $excludeList])
            ->all();

        $userTypeArr = [];
        foreach ($userType as $key => $user_type_model) {
            $userTypeArr[$user_type_model->USER_TYPE_ID] = $user_type_model->USER_TYPE_NAME;
        }

        return $userTypeArr;
    }
}