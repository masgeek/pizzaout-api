<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 11/4/2017
 * Time: 11:54 AM
 */

namespace app\model_extended;


use app\helpers\APP_UTILS;
use app\models\CustomerOrderItem;

class CUSTOMER_ORDER_ITEMS extends CustomerOrderItem
{

    public static function GetOrderTotal($order_id)
    {
        return self::find()->where(['ORDER_ID' => $order_id])->sum('SUBTOTAL');

    }

    public static function GetOrderQuantity($order_id)
    {
        return self::find()->where(['ORDER_ID' => $order_id])->sum('QUANTITY');
    }

    public static function BuildItemsTable($model)
    {
        $formatter = \Yii::$app->formatter;
        $orderTotal = 0.0;
        $table = <<<TABLE

<table data-height="auto" class="table table-condensed">
    <thead>
    <tr>
        <th>&nbsp;</th>
        <th>Items</th>
    </tr>
    </thead>
    <tbody>
TABLE;


        foreach ($model as $orderItems):
            $table .= '<tr>';
//lets do the order total here
            $orderTotal = $orderTotal + (float)$orderItems->SUBTOTAL;
            $table .= "<td>{$orderItems->QUANTITY}x</td>";
            $table .= "<td>{$orderItems->iTEMTYPE->mENUITEM->MENU_ITEM_NAME} ({$orderItems->iTEMTYPE->ITEM_TYPE_SIZE})</td>";
            $table .= '</tr>';
        endforeach;

        $table .= <<<TABLE
    <tr>
        <td class="thick-line"></td>
        <td class="thick-line"></td>
    </tr>
    </tbody>
</table>
TABLE;

        return $table;
    }
}