<?php

namespace app\models_search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\model_extended\MENU_ITEMS;

/**
 * MenuItemSearch represents the model behind the search form of `app\model_extended\MENU_ITEMS`.
 */
class MenuItemSearch extends MENU_ITEMS
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MENU_ITEM_ID', 'MENU_CAT_ID', 'MAX_QTY'], 'integer'],
            [['MENU_ITEM_NAME', 'MENU_ITEM_DESC', 'MENU_ITEM_IMAGE'], 'safe'],
            [['HOT_DEAL', 'VEGETARIAN'], 'boolean'],
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
        $query = MENU_ITEMS::find();

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
            'MENU_ITEM_ID' => $this->MENU_ITEM_ID,
            'MENU_CAT_ID' => $this->MENU_CAT_ID,
            'HOT_DEAL' => $this->HOT_DEAL,
            'VEGETARIAN' => $this->VEGETARIAN,
            'MAX_QTY' => $this->MAX_QTY,
        ]);

        $query->andFilterWhere(['like', 'MENU_ITEM_NAME', $this->MENU_ITEM_NAME])
            ->andFilterWhere(['like', 'MENU_ITEM_DESC', $this->MENU_ITEM_DESC])
            ->andFilterWhere(['like', 'MENU_ITEM_IMAGE', $this->MENU_ITEM_IMAGE]);

        return $dataProvider;
    }
}
