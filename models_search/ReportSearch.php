<?php

namespace app\models_search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\model_extended\ReportModel;

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
            [['ORDER_ID', 'LOCATION_ID', 'KITCHEN_ID', 'CHEF_ID', 'RIDER_ID', 'USER_ID', 'USER_TYPE', 'COUNTRY_ID'], 'integer'],
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
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ReportModel::find();

        // add conditions that should always apply here


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false
        ]);

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
            $this->START_DATE = $this->FirstDayOfMonth(); //date('Y-m-d');
            $this->END_DATE = $this->LastDayOfMonth(); //date('Y-m-d');
        }


        // grid filtering conditions
        $query->andFilterWhere([
            'ORDER_ID' => $this->ORDER_ID,
            'LOCATION_ID' => $this->LOCATION_ID,
            'KITCHEN_ID' => $this->KITCHEN_ID,
            'CHEF_ID' => $this->CHEF_ID,
            'RIDER_ID' => $this->RIDER_ID,
            //'ORDER_DATE' => $this->ORDER_DATE,
            //'CREATED_AT' => $this->CREATED_AT,
            //'UPDATED_AT' => $this->UPDATED_AT,
            'USER_ID' => $this->USER_ID,
            'USER_TYPE' => $this->USER_TYPE,
            'COUNTRY_ID' => $this->COUNTRY_ID,
        ]);

        $query->andFilterWhere(['like', 'PAYMENT_METHOD', $this->PAYMENT_METHOD])
            ->andFilterWhere(['like', 'ORDER_STATUS', $this->ORDER_STATUS])
            ->andFilterWhere(['like', 'ORDER_TIME', $this->ORDER_TIME])
            ->andFilterWhere(['like', 'NOTES', $this->NOTES])
            ->andFilterWhere(['like', 'USER_NAME', $this->USER_NAME])
            ->andFilterWhere(['like', 'SURNAME', $this->SURNAME])
            ->andFilterWhere(['like', 'OTHER_NAMES', $this->OTHER_NAMES])
            ->andFilterWhere(['like', 'LOCATION_NAME', $this->LOCATION_NAME])
            ->andFilterWhere(['like', 'CHEF_NAME', $this->CHEF_NAME])
            ->andFilterWhere(['between', 'ORDER_DATE', $this->START_DATE, $this->END_DATE]);

        return $dataProvider;
    }

    private function FirstDayOfMonth($format = 'Y-m-d 00:00:00')
    {
        return date($format, strtotime('first day of this month'));
    }

    private function LastDayOfMonth($format = 'Y-m-d 23:59:59')
    {
        return date($format, strtotime('last day of this month'));
    }
}
