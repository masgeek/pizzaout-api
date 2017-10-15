<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 11:59 AM
 */

namespace app\model_extended;


use app\models\CustomerOrder;
use yii\db\Expression;

class CUSTOMER_ORDERS extends CustomerOrder
{

	public function attributeLabels()
	{
		$labels = parent::attributeLabels();
		$labels['LOCATION_ID'] = 'Location';
		$labels['USER_ID'] = 'Customer';
		$labels['NOTES'] = 'Notes';
		$labels['ORDER_PRICE'] = 'Total';
		$labels['PAYMENT_METHOD'] = 'Payment';
		$labels['ORDER_STATUS'] = 'Status';
		$labels['ORDER_ID'] = 'ORDER ID #';
		return $labels;
	}

	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);
		//lets add to tracking table
		$tracker = new STATUS_TRACKING_MODEL();
		$tracker->ORDER_ID = $this->ORDER_ID;
		$tracker->STATUS = $this->ORDER_STATUS;
		$tracker->TRACKING_DATE = new Expression('NOW()');
		$tracker->save();
	}
}