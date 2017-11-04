<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 7/17/2017
 * Time: 3:45 PM
 */

namespace app\api\modules\v1\controllers;


use app\api\modules\v1\models\CUSTOMER_ORDER_ITEM;
use app\api\modules\v1\models\CUSTOMER_ORDER_MODEL;
use app\api\modules\v1\models\PAYMENT_MODEL;
use app\components\CUSTOM_HELPER;
use app\components\ORDER_STATUS_HELPER;
use app\helpers\APP_UTILS;
use yii\db\Expression;
use yii\rest\ActiveController;

class OrderController extends ActiveController
{
	/**
	 * @var object
	 */
	public $modelClass = 'app\api\modules\v1\models\CUSTOMER_ORDER_MODEL';


	public function actionPay($user_id)
	{
		//create fictitious order
		$customerOrder = new CUSTOMER_ORDER_MODEL();
		$orderItems = new CUSTOMER_ORDER_ITEM();
		$paymentDetail = new PAYMENT_MODEL();

		$date = APP_UTILS::GetCurrentDateTime();

		$order_status = ORDER_STATUS_HELPER::STATUS_ORDER_PENDING;
		$post = [
			'PAYMENT_MODEL' => [
				'PAYMENT_REF' => strtoupper(uniqid('PIZZA_')),
				'PAYMENT_CHANNEL' => 'MOBILE',
				'PAYMENT_AMOUNT' => 1200,
				'PAYMENT_STATUS' => $order_status,
				'PAYMENT_NOTES' => 'N/A',
			],
			'CUSTOMER_ORDER_ITEM' => [
				'ITEM_TYPE_ID' => 1,
				'QUANTITY' => 2,
				'PRICE' => 1200,
				'SUBTOTAL' => 1200,
				'OPTIONS' => 'N/A',
				'NOTES' => 'Test Order',
			],
			'CUSTOMER_ORDER_MODEL' => [
				'USER_ID' => $user_id,
				'ADDRESS_ID' => 1,
				//'ORDER_QUANTITY' => 2,
				//'ORDER_PRICE' => 1200,
				'PAYMENT_METHOD' => 'MOBILE',
				'ORDER_STATUS' => $order_status,
				'NOTES' => 'EXTRA CHEESE',
			]
		];

		$customerOrder->load($post);
		$orderItems->load($post);
		$paymentDetail->load($post);

		$customerOrder->ORDER_DATE = $date;

		if ($customerOrder->save()) {
			$orderItems->CREATED_AT = $date;
			$orderItems->ORDER_ID = $customerOrder->ORDER_ID;

			$paymentDetail->PAYMENT_DATE = $date;
			$paymentDetail->ORDER_ID = $customerOrder->ORDER_ID;

			$orderItems->save();
			$paymentDetail->save();
		}
		$customerOrder->validate();
		$orderItems->validate();
		$paymentDetail->validate();

		return $customerOrder;
	}
}