<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/17/2017
 * Time: 12:33 PM
 */

namespace app\api\modules\v1\models;

/*
 * User_ID
Surname
Other_Names
Mobile
Email
Location_ID
User_Name
Password
User_Type

 */
use app\helpers\APP_UTILS;
use app\model_extended\RIDER_MODEL;
use app\models\Users;
use app\models\UserType;

/**
 * Class USER_MODEL
 * @package app\api\modules\v1\models
 * @property API_TOKEN_MODEL $apiToken
 */
class USER_MODEL extends Users
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    public $CHANGE_PASSWORD;

    /**
     * @return array
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[APP_UTILS::SCENARIO_CREATE] = ['SURNAME', 'OTHER_NAMES', 'MOBILE', 'EMAIL', 'LOCATION_ID', 'USER_NAME', 'PASSWORD', 'USER_TYPE','RESET_TOKEN','USER_STATUS'];
        $scenarios[APP_UTILS::SCENARIO_UPDATE] = ['SURNAME', 'OTHER_NAMES', 'MOBILE', 'EMAIL', 'LOCATION_ID', 'USER_NAME', 'PASSWORD', 'USER_TYPE','RESET_TOKEN','USER_STATUS'];

        return $scenarios;
    }

    /**
     * @return array
     */
    public function rules()
    {
        $rules = parent::rules();

        $rules[] = [['EMAIL', 'USER_NAME'], 'unique', 'on' => [APP_UTILS::SCENARIO_CREATE, APP_UTILS::SCENARIO_UPDATE]];
        $rules[] = [['PASSWORD'], 'string', 'min' => 6, 'on' => [APP_UTILS::SCENARIO_CREATE, APP_UTILS::SCENARIO_UPDATE]];
        return $rules;
    }

    /**
     * @param bool $insert
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function beforeSave($insert)
    {
        $date = APP_UTILS::GetCurrentDateTime();
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->DATE_REGISTERED = $date;
            }
            $this->LAST_UPDATED = $date;
            return true;
        }
        return false;
    }

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();

        return $labels;
    }

    /**
     * @return array
     */
    public function fields()
    {
        $fields = parent::fields();

        $fields['USER_TYPE'] = function ($model) {
            /* @var $model USER_MODEL */
            return UserType::findOne($model->USER_TYPE)->USER_TYPE_NAME;
        };

        $fields['RIDER_ID'] = function ($model) {
            /* @var $model USER_MODEL */
            $rider = RIDER_MODEL::findOne(['USER_ID' => $model->USER_ID]);
            return $rider != null ? $rider->RIDER_ID : 0;
        };

        $fields['API_TOKEN'] = function ($model) {
            /* @var $model USER_MODEL */
            $token = $model->apiToken;
            return $token != null ? $token->API_TOKEN : 0;

        };
        unset($fields['PASSWORD']); //remove the password field

        ksort($fields);
        return $fields;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApiToken()
    {
        return $this->hasOne(API_TOKEN_MODEL::className(), ['USER_ID' => 'USER_ID']);
    }
}