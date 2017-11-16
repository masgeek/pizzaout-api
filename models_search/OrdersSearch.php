<?php

namespace app\models_search;

use app\model_extended\ORDER_VIEW_MODEL;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * OrdersSearch represents the model behind the search form of `app\model_extended\ORDER_VIEW_MODEL`.
 */
class OrdersSearch extends ORDER_VIEW_MODEL
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ORDER_ID', 'USER_ID', 'ADDRESS_ID', 'CHEF_ID',
                'RIDER_ID', 'SURNAME', 'OTHER_NAMES', 'MOBILE',
                'ORDER_DATE', 'PAYMENT_METHOD', 'ORDER_STATUS',
                'NOTES', 'CREATED_AT', 'UPDATED_AT', 'PAYMENT_NUMBER'
            ], 'safe'],
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
     * @param array $order_status
     * @return ActiveDataProvider
     */
    public function search($params, array $order_status)
    {
        $query = ORDER_VIEW_MODEL::find();

        // add conditions that should always apply here

        $query->andWhere(['ORDER_STATUS' => $order_status]);

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
            'USER_ID' => $this->USER_ID,
            'ADDRESS_ID' => $this->ADDRESS_ID,
            'CHEF_ID' => $this->CHEF_ID,
            'RIDER_ID' => $this->RIDER_ID,
            'ORDER_DATE' => $this->ORDER_DATE,
            'CREATED_AT' => $this->CREATED_AT,
            'UPDATED_AT' => $this->UPDATED_AT,
            'SURNAME' => $this->SURNAME,
            'OTHER_NAMES' => $this->OTHER_NAMES,
            'MOBILE' => $this->MOBILE,
            'PAYMENT_NUMBER' => $this->PAYMENT_NUMBER,
        ]);

        $query->andFilterWhere(['like', 'PAYMENT_METHOD', $this->PAYMENT_METHOD])
            ->andFilterWhere(['like', 'ORDER_ID', $this->ORDER_ID])
            ->andFilterWhere(['like', 'NOTES', $this->NOTES]);

        return $dataProvider;
    }

    /**
     * @param       $params
     * @param array $order_status
     * @return ActiveDataProvider
     */
    public function searchKitchenQueue(array $params, array $order_status)
    {
        $query = ORDER_VIEW_MODEL::find();

        // add conditions that should always apply here
        $query->andWhere(['ORDER_STATUS' => $order_status]);


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ORDER_ID' => $this->ORDER_ID,
            'USER_ID' => $this->USER_ID,
            'ADDRESS_ID' => $this->ADDRESS_ID,
            'CHEF_ID' => $this->CHEF_ID,
            'RIDER_ID' => $this->RIDER_ID,
            'ORDER_STATUS' => $this->ORDER_STATUS,
        ]);

        $query->andFilterWhere(['like', 'PAYMENT_METHOD', $this->PAYMENT_METHOD])
            //->andFilterWhere(['like', 'ORDER_STATUS', $this->ORDER_STATUS])
            ->andFilterWhere(['like', 'NOTES', $this->NOTES]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @param array $order_status
     * @return ActiveDataProvider
     */
    public function searchCustomerOrders($params, array $order_status, $user_id)
    {
        $query = ORDER_VIEW_MODEL::find();

        // add conditions that should always apply here

        $query->andWhere(['USER_ID' => $user_id]);
        //$query->andWhere(['ORDER_STATUS' => $order_status]);

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
            'USER_ID' => $this->USER_ID,
            'ADDRESS_ID' => $this->ADDRESS_ID,
            'CHEF_ID' => $this->CHEF_ID,
            'RIDER_ID' => $this->RIDER_ID,
            'ORDER_DATE' => $this->ORDER_DATE,
            'CREATED_AT' => $this->CREATED_AT,
            'UPDATED_AT' => $this->UPDATED_AT,
            'SURNAME' => $this->SURNAME,
            'OTHER_NAMES' => $this->OTHER_NAMES,
            'MOBILE' => $this->MOBILE,
            'PAYMENT_NUMBER' => $this->PAYMENT_NUMBER,
        ]);

        $query->andFilterWhere(['like', 'PAYMENT_METHOD', $this->PAYMENT_METHOD])
            ->andFilterWhere(['like', 'ORDER_ID', $this->ORDER_ID])
            ->andFilterWhere(['like', 'NOTES', $this->NOTES]);

        return $dataProvider;
    }
}
