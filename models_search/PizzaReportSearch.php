<?php

namespace app\models_search;

use app\helpers\APP_UTILS;
use app\helpers\ORDER_HELPER;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\model_extended\PizzaReportModel;

/**
 * PizzaReportSearch represents the model behind the search form of `app\model_extended\PizzaReportModel`.
 */
class PizzaReportSearch extends PizzaReportModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'LOCATION_ID', 'KITCHEN_ID', 'CHEF_ID', 'RIDER_ID', 'USER_ID', 'USER_TYPE', 'COUNTRY_ID', 'QUANTITY', 'MENU_ITEM_ID', 'MENU_CAT_ID', 'ITEM_TYPE_ID'], 'integer'],
            [['ORDER_DATE', 'MENU_ITEM_NAME', 'MENU_ITEM_DESC','MENU_CAT_NAME', 'ITEM_TYPE_SIZE', 'START_DATE', 'END_DATE'], 'safe'],
            [['PRICE'], 'number'],
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

    public function GeneralSearch($params)
    {
        $order_status = [
            ORDER_HELPER::STATUS_ORDER_CANCELLED,
            ORDER_HELPER::STATUS_ORDER_PENDING,
            ORDER_HELPER::STATUS_PAYMENT_PENDING,
        ];
        $query = PizzaReportModel::find();

        // add conditions that should always apply here

        //$query->andWhere(['ORDER_STATUS','' => $order_status]);
        $query->andWhere(['NOT IN', 'ORDER_STATUS', $order_status]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            //'pagination' => false,
            'sort' => false
        ]);

        $query->orderBy(['ORDER_ID' => SORT_DESC]);
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


// grid filtering conditions
        // grid filtering conditions
        $query->andFilterWhere([
            //'ORDER_ID' => $this->ORDER_ID,
            //'LOCATION_ID' => $this->LOCATION_ID,
            //'KITCHEN_ID' => $this->KITCHEN_ID,
            //'CHEF_ID' => $this->CHEF_ID,
            //'RIDER_ID' => $this->RIDER_ID,
            //'ORDER_DATE' => $this->ORDER_DATE,
            //'CREATED_AT' => $this->CREATED_AT,
            //'UPDATED_AT' => $this->UPDATED_AT,
            //'USER_ID' => $this->USER_ID,
            //'USER_TYPE' => $this->USER_TYPE,
            //'COUNTRY_ID' => $this->COUNTRY_ID,
            //'QUANTITY' => $this->QUANTITY,
            //'PRICE' => $this->PRICE,
        ]);

        $query->andFilterWhere(['like', 'PAYMENT_METHOD', $this->PAYMENT_METHOD])
            //->andFilterWhere(['like', 'ORDER_STATUS', $this->ORDER_STATUS])
            //->andFilterWhere(['like', 'ORDER_TIME', $this->ORDER_TIME])
            //->andFilterWhere(['like', 'NOTES', $this->NOTES])
            //->andFilterWhere(['like', 'USER_NAME', $this->USER_NAME])
            //->andFilterWhere(['like', 'SURNAME', $this->SURNAME])
            //->andFilterWhere(['like', 'OTHER_NAMES', $this->OTHER_NAMES])
            //->andFilterWhere(['like', 'LOCATION_NAME', $this->LOCATION_NAME])
            //->andFilterWhere(['like', 'CHEF_NAME', $this->CHEF_NAME])
            ->andFilterWhere(['like', 'MENU_ITEM_NAME', $this->MENU_ITEM_NAME])
            ->andFilterWhere(['like', 'ITEM_TYPE_SIZE', $this->ITEM_TYPE_SIZE])
            ->andFilterWhere(['like', 'MENU_CAT_NAME', $this->MENU_CAT_NAME])
            ->andFilterWhere(['between', 'ORDER_DATE', $this->START_DATE, $this->END_DATE]);

        return $dataProvider;
    }
}
