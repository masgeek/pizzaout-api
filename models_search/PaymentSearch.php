<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 8/22/2017
 * Time: 4:39 PM
 */

namespace app\models_search;

use app\helpers\ORDER_STATUS_HELPER;
use app\model_extended\CUSTOMER_PAYMENTS;
use Yii;
use yii\data\ActiveDataProvider;


class PaymentSearch extends CUSTOMER_PAYMENTS
{
	public $START_DATE;
	public $END_DATE;

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['PAYMENT_DATE'], 'safe'],
		];
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params)
	{
		$owner = Yii::$app->user->id;
		$query = self::find();

		// add conditions that should always apply here

		//$query->groupBy('SERVICE_NAME');
		$query->where(['OWNER_ID' => $owner]);
		$query->andWhere(['PAYMENT_STATUS' => ORDER_STATUS_HELPER::STATUS_PAYMENT_CONFIRMED]);
		$query->orderBy(['PAYMENT_DATE' => SORT_DESC]);

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		if ($this->PAYMENT_DATE != null) {
			$date = explode("TO", $this->PAYMENT_DATE);
			$this->START_DATE = trim($date[0]);
			$this->END_DATE = trim($date[1]);
		} else {
			$this->START_DATE = date('Y-m-d');
			$this->END_DATE = date('Y-m-d');
		}

		// grid filtering conditions
		$query->andFilterWhere([
			'PAYMENT_STATUS' => $this->PAYMENT_STATUS,
		]);

		//$query->andFilterWhere(['like', 'PAYMENT_REF', $this->PAYMENT_REF]);
		$query->andFilterWhere(['between', 'PAYMENT_DATE', $this->START_DATE, $this->END_DATE]);

		return $dataProvider;
	}
}