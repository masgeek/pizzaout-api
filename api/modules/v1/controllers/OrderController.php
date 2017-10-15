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

		$date = new Expression('NOW()');

		$post = [
			'PAYMENT_MODEL' => [
				'ORDER_ID' => 1,
				'PAYMENT_REF' => uniqid('PIZZA_'),
				'PAYMENT_CHANNEL' => 'MOBILE',
				'PAYMENT_AMOUNT' => 400,
				'PAYMENT_STATUS' => 'PENDING',
				'PAYMENT_NOTES' => 'N/A',
			],
			'CUSTOMER_ORDER_ITEM' => [
				'ORDER_ID' => 1,
				'ITEM_TYPE_ID' => 1,
				'QUANTITY' => 2,
				'PRICE' => 100,
				'SUBTOTAL' => 100,
				'OPTIONS' => 'N/A',
				'NOTES' => 'Test Order',
			],
			'CUSTOMER_ORDER_MODEL' => [
				'USER_ID' => $user_id,
				'LOCATION_ID' => 1,
				//'KITCHEN_ID',
				//'CHEF_ID',
				//'RIDER_ID',
				'ORDER_QUANTITY' => 2,
				//'ORDER_DATE',
				'ORDER_PRICE' => 400,
				'PAYMENT_METHOD' => 'MOBILE',
				'ORDER_STATUS' => 'PENDING',
				'NOTES' => 'EXTRA CHEESE',
				//'CREATED_AT',
				//'UPDATED_AT',
				//'UPDATED_AT'
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