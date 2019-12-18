<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 11:59 AM
 */

namespace app\model_extended;


use app\api\modules\v1\models\PAYMENT_MODEL;
use app\helpers\APP_UTILS;
use app\models\CustomerOrder;
use app\models\OrderTracking;
use Yii;
use yii\base\Exception;
use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;

/**
 * Class CUSTOMER_ORDERS
 * @package app\model_extended
 *
 * @deprecated
 */
class CUSTOMER_ORDERS extends CustomerOrder
{




    public function rulesDisabled()
    {
        $rules = parent::rules();

        $rules[] = [['ORDER_STATUS', 'ALERT_USER'], 'required', 'on' => [
            APP_UTILS::SCENARIO_ALLOCATE_KITCHEN,
            APP_UTILS::SCENARIO_CONFIRM_ORDER,
            APP_UTILS::SCENARIO_ASSIGN_CHEF,
            APP_UTILS::SCENARIO_PREPARE_ORDER,
            APP_UTILS::SCENARIO_ORDER_READY,
            APP_UTILS::SCENARIO_ASSIGN_RIDER,
        ]];
        $rules[] = [['KITCHEN_ID'], 'required', 'on' => [APP_UTILS::SCENARIO_ALLOCATE_KITCHEN,]];
        //$rules[] = [['COMMENTS'], 'required', 'on' => [APP_UTILS::SCENARIO_CONFIRM_ORDER,]];
        $rules[] = [['CHEF_ID'], 'required', 'on' => [APP_UTILS::SCENARIO_ASSIGN_CHEF,]];
        $rules[] = [['RIDER_ID'], 'required', 'on' => [APP_UTILS::SCENARIO_ASSIGN_RIDER,]];
        return $rules;
    }

}