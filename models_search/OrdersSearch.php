<?php

namespace app\models_search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\model_extended\CUSTOMER_ORDERS;

/**
 * OrdersSearch represents the model behind the search form of `app\model_extended\CUSTOMER_ORDERS`.
 */
class OrdersSearch extends CUSTOMER_ORDERS
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'USER_ID', 'LOCATION_ID', 'CHEF_ID', 'RIDER_ID', 'ORDER_QUANTITY'], 'integer'],
            [['ORDER_DATE', 'PAYMENT_METHOD', 'ORDER_STATUS', 'NOTES', 'CREATED_AT', 'UPDATED_AT'], 'safe'],
            [['ORDER_PRICE'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = CUSTOMER_ORDERS::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ORDER_ID' => $this->ORDER_ID,
            'USER_ID' => $this->USER_ID,
            'LOCATION_ID' => $this->LOCATION_ID,
            'CHEF_ID' => $this->CHEF_ID,
            'RIDER_ID' => $this->RIDER_ID,
            'ORDER_QUANTITY' => $this->ORDER_QUANTITY,
            'ORDER_DATE' => $this->ORDER_DATE,
            'ORDER_PRICE' => $this->ORDER_PRICE,
            'CREATED_AT' => $this->CREATED_AT,
            'UPDATED_AT' => $this->UPDATED_AT,
        ]);

        $query->andFilterWhere(['like', 'PAYMENT_METHOD', $this->PAYMENT_METHOD])
            ->andFilterWhere(['like', 'ORDER_STATUS', $this->ORDER_STATUS])
            ->andFilterWhere(['like', 'NOTES', $this->NOTES]);

        return $dataProvider;
    }
}
