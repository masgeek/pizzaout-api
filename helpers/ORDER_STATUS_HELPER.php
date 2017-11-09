<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 11/4/2017
 * Time: 9:43 AM
 */

namespace app\helpers;


use app\model_extended\STATUS_MODEL;

class ORDER_STATUS_HELPER
{
    const STATUS_ORDER_CANCELLED = 'ORDER CANCELLED';
    const STATUS_ORDER_PENDING = 'ORDER PENDING';
    const STATUS_PAYMENT_CONFIRMED = 'PAYMENT CONFIRMED';
    const STATUS_ORDER_CONFIRMED = 'ORDER CONFIRMED';
    const STATUS_KITCHEN_ASSIGNED = 'KITCHEN ALLOCATED';
    const STATUS_CHEF_ASSIGNED = 'CHEF ASSIGNED';
    const STATUS_UNDER_PREPARATION = 'UNDER PREPARATION';
    const STATUS_ORDER_READY = 'ORDER READY';
    const STATUS_AWAITING_RIDER = 'AWAITING RIDER';
    const STATUS_RIDER_ASSIGNED = 'RIDER ASSIGNED';
    const STATUS_RIDER_DISPATCHED = 'RIDER DISPATCHED';
    const STATUS_ORDER_DELIVERED = 'ORDER DELIVERED';


    /**
     * @param $order_id
     * @param $scope
     * @return int|mixed
     */
    public static function NextWorkFlow($order_id, $scope)
    {
        $usedFlows = STATUS_MODEL::StatusExclusionList($order_id);

        $status = STATUS_MODEL::find()
            ->where(['SCOPE' => $scope])
            ->andWhere(['NOT IN', 'STATUS_NAME', $usedFlows])
            ->orderBy(['RANK' => SORT_ASC])
            ->one();

        return $status != null ? $status->WORKFLOW : 0;
    }
}