<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 11:59 AM
 */

namespace app\model_extended;


use app\helpers\APP_UTILS;
use app\models\CustomerOrder;
use app\models\OrderTracking;

class CUSTOMER_ORDERS extends CustomerOrder
{

    public $COMMENTS;
    public $ALERT_USER = true;

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['ADDRESS_ID'] = 'Delivery Address';
        $labels['USER_ID'] = 'Customer';
        $labels['KITCHEN_ID'] = 'Assign Kitchen';
        $labels['CHEF_ID'] = 'Assign Chef';
        $labels['RIDER_ID'] = 'Assign Rider';
        $labels['NOTES'] = 'Notes';
        $labels['ORDER_PRICE'] = 'Total';
        $labels['PAYMENT_METHOD'] = 'Payment';
        $labels['ORDER_STATUS'] = 'Status';
        $labels['ALERT_USER'] = 'Notify User';
        $labels['ORDER_ID'] = 'Order ID #';

        return $labels;
    }


    public function rules()
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

    public function beforeSave($insert)
    {
        $date = APP_UTILS::GetCurrentDateTime();
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->CREATED_AT = $date;
            }
            $this->UPDATED_AT = $date;
            return true;
        }
        return false;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        //lets add to tracking table
        $tracker = new STATUS_TRACKING_MODEL();
        $tracker->ORDER_ID = $this->ORDER_ID;
        $tracker->STATUS = $this->ORDER_STATUS;
        $tracker->COMMENTS = $this->COMMENTS;
        $tracker->TRACKING_DATE = APP_UTILS::GetCurrentDateTime();
        $tracker->USER_VISIBLE = $this->ALERT_USER;
        $tracker->save();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderTrackings()
    {
        return $this->hasMany(OrderTracking::className(), ['ORDER_ID' => 'ORDER_ID'])->orderBy(['TRACKING_DATE' => SORT_DESC]);
    }

}