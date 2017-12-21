<?php

namespace app\models_search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\model_extended\MENU_ITEM_TYPE;

/**
 * MenuItemTypeSearch represents the model behind the search form of `app\model_extended\MENU_ITEM_TYPE`.
 */
class MenuItemTypeSearch extends MENU_ITEM_TYPE
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ITEM_TYPE_ID', 'MENU_ITEM_ID'], 'integer'],
            [['ITEM_TYPE_SIZE'], 'safe'],
            [['PRICE'], 'number'],
            [['AVAILABLE'], 'boolean'],
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
        $query = MENU_ITEM_TYPE::find();

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
            'ITEM_TYPE_ID' => $this->ITEM_TYPE_ID,
            'MENU_ITEM_ID' => $this->MENU_ITEM_ID,
            'PRICE' => $this->PRICE,
            'AVAILABLE' => $this->AVAILABLE,
        ]);

        $query->andFilterWhere(['like', 'ITEM_TYPE_SIZE', $this->ITEM_TYPE_SIZE]);

        return $dataProvider;
    }
}
