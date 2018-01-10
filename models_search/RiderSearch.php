<?php

namespace app\models_search;

use app\model_extended\RIDER_MODEL;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RiderSearch represents the model behind the search form of `app\model_extended\RIDER_MODEL`.
 */
class RiderSearch extends RIDER_MODEL
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RIDER_ID', 'USER_ID', 'KITCHEN_ID'], 'integer'],
            [['RIDER_STATUS'], 'boolean'],
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
        $query = RIDER_MODEL::find();

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
            'RIDER_ID' => $this->RIDER_ID,
            'USER_ID' => $this->USER_ID,
            'KITCHEN_ID' => $this->KITCHEN_ID,
            'RIDER_STATUS' => $this->RIDER_STATUS,
        ]);

        return $dataProvider;
    }
}
