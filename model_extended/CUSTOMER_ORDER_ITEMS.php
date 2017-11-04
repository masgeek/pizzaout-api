<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 11/4/2017
 * Time: 11:54 AM
 */

namespace app\model_extended;


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
}