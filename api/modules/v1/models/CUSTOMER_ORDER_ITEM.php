<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 6:55 PM
 */

namespace app\api\modules\v1\models;


use app\models\CustomerOrderItem;

class CUSTOMER_ORDER_ITEM extends CustomerOrderItem
{
    public static function GetItemTypes($order_id)
    {
        /* @var $model $this */

        $data = self::find()
            ->with('iTEMTYPE')
            ->where(['ORDER_ID' => $order_id])
            ->all();

        //let us rebuild the array
        foreach ($data as $model) {
            // get data from relation model
            $data['SAM'] = [$model->iTEMTYPE->mENUITEM];
        }
        return $data;
    }
}