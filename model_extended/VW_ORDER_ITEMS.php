<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 1/4/2018
 * Time: 4:17 PM
 */

namespace app\model_extended;


use app\helpers\ReceiptItem;
use app\models\VwOrderItems;

class VW_ORDER_ITEMS extends VwOrderItems
{
    /**
     * Create items for teh receipt
     * @param $order_id
     * @return array
     *
     * @author Sammy Barasa <barsamms@gmail.com>
     */
    public static function CreateReceiptObjects($order_id)
    {
        $items = [];

        $orders = self::GetOrders($order_id);
        if ($orders != null) {
            /*$items = array(
                new ReceiptItem("Example item #1", "4.00"),
                new ReceiptItem("Another thing", "3.50"),
                new ReceiptItem("Something else", "1.00"),
                new ReceiptItem("A final item", "4.45"),
            );*/
            foreach ($orders as $key => $value) {
                $price = $value->QUANTITY * (float)$value->PRICE;
                $itemName = "{$value->MENU_ITEM_NAME} ({$value->MENU_CAT_NAME}";

                $items[] = new ReceiptItem($itemName, $price);

            }
        }

        return $items;
    }

    public static function GetOrders($order_id)
    {
        return self::findAll(['ORDER_ID' => $order_id]);
    }

    public static function CreateReceiptSubtotal($order_id)
    {
        $subtotal = 0;

        $orders = self::GetOrders($order_id);
        if ($orders != null) {
            foreach ($orders as $key => $value) {
                $subtotal = $subtotal + ($value->QUANTITY * (float)$value->PRICE);
            }
        }

        return new ReceiptItem('Subtotal', $subtotal);
    }

    public static function CreateReceiptTax($order_id, $taxRate)
    {
        $subtotal = 0;

        $orders = self::GetOrders($order_id);
        if ($orders != null) {
            foreach ($orders as $key => $value) {
                $subtotal = $subtotal + ($value->QUANTITY * (float)$value->PRICE);
            }
        }

        return new ReceiptItem('Subtotal', $subtotal);
    }
}