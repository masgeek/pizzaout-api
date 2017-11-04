<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 10/15/2017
 * Time: 11:59 AM
 */

namespace app\model_extended;


use app\helpers\APP_UTILS;
use app\models\CustomerOrder;
use app\models\OrderTracking;
use yii\db\Expression;

class CUSTOMER_ORDERS extends CustomerOrder
{

	public function attributeLabels()
	{
		$labels = parent::attributeLabels();
		$labels['ADDRESS_ID'] = 'Delivery Address';
		$labels['USER_ID'] = 'Customer';
		$labels['KITCHEN_ID'] = 'Assign Kitchen';
		$labels['CHEF_ID'] = 'Assign Chef';
		$labels['RIDER_ID'] = 'Assign Rider';
		$labels['NOTES'] = 'Notes';
		$labels['ORDER_PRICE'] = 'Total';
		$labels['PAYMENT_METHOD'] = 'Payment';
		$labels['ORDER_STATUS'] = 'Status';
		$labels['ORDER_ID'] = 'ORDER ID #';

		return $labels;
	}


	public function rules()
	{
		$rules = parent::rules();

		$rules[] = [['KITCHEN_ID', 'CHEF_ID', 'NOTES'], 'required', 'on' => [APP_UTILS::SCENARIO_CREATE, APP_UTILS::SCENARIO_UPDATE]];
		$rules[] = [['KITCHEN_ID'], 'required', 'on' => [APP_UTILS::SCENARIO_ALLOCATE_KITCHEN,]];
		return $rules;
	}

	public function beforeSave($insert)
	{
		$date = APP_UTILS::GetCurrentDateTime();
		if (parent::beforeSave($insert)) {
			if ($this->isNewRecord) {
				$this->CREATED_AT = $date;
			}
			$this->UPDATED_AT = $date;
			return true;
		}
		return false;
	}

	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);
		//lets add to tracking table
		$tracker = new STATUS_TRACKING_MODEL();
		$tracker->ORDER_ID = $this->ORDER_ID;
		$tracker->STATUS = $this->ORDER_STATUS;
		$tracker->TRACKING_DATE = APP_UTILS::GetCurrentDateTime();
		$tracker->save();
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOrderTrackings()
	{
		return $this->hasMany(OrderTracking::className(), ['ORDER_ID' => 'ORDER_ID'])->orderBy(['TRACKING_DATE' => SORT_DESC]);
	}
}