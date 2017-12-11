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
            ->where(['ORDER_ID' => $order_id])
            ->all();

        //let us rebuild the array
        $itemDetails = [];
        foreach ($data as $model) {
            $itemDetails[] = [
                'ORDER_ITEMS' => $model,
                'ITEM_TYPE' => $model->iTEMTYPE,
                'MENU_ITEM' => $model->iTEMTYPE->mENUITEM
            ];
        }
        return $itemDetails;
    }
}