<?php

namespace app\models_search;

use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
use app\model_extended\ReportModel;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ReportSearch represents the model behind the search form of `app\model_extended\ReportModel`.
 */
class ReportSearch extends ReportModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'LOCATION_ID', 'KITCHEN_ID', 'CHEF_ID', 'RIDER_ID', 'USER_ID', 'USER_TYPE'], 'integer'],
            [['ORDER_DATE', 'PAYMENT_METHOD', 'ORDER_STATUS', 'ORDER_TIME', 'NOTES', 'CREATED_AT', 'UPDATED_AT', 'USER_NAME', 'SURNAME', 'OTHER_NAMES', 'LOCATION_NAME', 'CHEF_NAME'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @param array $order_status
     * @param bool $allOrders
     * @return ActiveDataProvider
     */
    public function GeneralSearch($params, $order_status = [], $allOrders = false)
    {
        $order_status = [
            ORDER_HELPER::STATUS_ORDER_CANCELLED,
            ORDER_HELPER::STATUS_ORDER_PENDING,
            ORDER_HELPER::STATUS_PAYMENT_PENDING,
            ORDER_HELPER::STATUS_ORDER_CONFIRMED,
        ];
        $query = ReportModel::find();

        // add conditions that should always apply here

        //$query->andWhere(['ORDER_STATUS','' => $order_status]);
        if ($allOrders) {
            $query->andFilterWhere(['like', 'ORDER_STATUS', $this->ORDER_STATUS]);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 100
                ],
                'sort' => false
            ]);
        } else {
            $query->andWhere(['NOT IN', 'ORDER_STATUS', $order_status]);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
                'pagination' => false,
                'sort' => false
            ]);
        }


        $query->orderBy(['ORDER_DATE' => SORT_DESC]);
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if ($this->ORDER_DATE != null && strlen($this->ORDER_DATE) > 1) {
            $date = explode("TO", $this->ORDER_DATE);

            $startDate = trim($date[0]) . ' 00:00:00';
            $endDate = trim($date[1]) . ' 23:59:59';

            $this->START_DATE = $startDate;
            $this->END_DATE = $endDate;

        } else {
            $this->START_DATE = APP_UTILS::FirstDayOfMonth(); //$this->FirstDayOfMonth(); //date('Y-m-d');
            $this->END_DATE = APP_UTILS::LastDayOfMonth();//$this->LastDayOfMonth(); //date('Y-m-d');
        }

        $query->andFilterWhere(['like', 'PAYMENT_METHOD', $this->PAYMENT_METHOD])
            ->andFilterWhere(['like', 'ORDER_STATUS', $this->ORDER_STATUS])
            ->andFilterWhere(['like', 'ORDER_TIME', $this->ORDER_TIME])
            ->andFilterWhere(['like', 'NOTES', $this->NOTES])
            ->andFilterWhere(['like', 'USER_NAME', $this->USER_NAME])
            ->andFilterWhere(['like', 'SURNAME', $this->SURNAME])
            ->andFilterWhere(['like', 'OTHER_NAMES', $this->OTHER_NAMES])
            ->andFilterWhere(['between', 'ORDER_DATE', $this->START_DATE, $this->END_DATE]);

        return $dataProvider;
    }
}
