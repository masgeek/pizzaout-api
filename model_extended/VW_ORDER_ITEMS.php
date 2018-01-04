<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 1/4/2018
 * Time: 4:17 PM
 */

namespace app\model_extended;


use app\helpers\ORDER_HELPER;
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
        $items = [
            new ReceiptItem('ITEMS')
        ];

        $orders = self::GetOrders($order_id);
        foreach ($orders as $key => $value) {
            $itemTotal = $value->QUANTITY * (float)$value->PRICE;
            $itemName = "{$value->MENU_ITEM_NAME} {$value->QUANTITY}x{$value->QUANTITY}";

            $items[] = new ReceiptItem($itemName, $itemTotal);
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
        foreach ($orders as $key => $value) {
            $subtotal = $subtotal + ($value->QUANTITY * (float)$value->PRICE);
        }

        return new ReceiptItem('Subtotal', $subtotal);
    }

    public static function CreateReceiptTax($subtotal)
    {
        $vatRate = ORDER_HELPER::getVatRate();
        $tax = ($subtotal * $vatRate) / 100;

        $taxObject = new ReceiptItem('VAT', $tax);
        $taxObject->TAX_AMOUNT = $tax;

        return $taxObject;
    }

    public static function CreateReceiptTotal($subtotal, $taxAmount)
    {
        $total = $subtotal + $taxAmount;

        return new ReceiptItem('Total', $total, true);
    }
}