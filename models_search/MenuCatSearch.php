<?php

namespace app\models_search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\model_extended\MENU_CATEGORY;

/**
 * MenuCatSearch represents the model behind the search form of `app\model_extended\MENU_CATEGORY`.
 */
class MenuCatSearch extends MENU_CATEGORY
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MENU_CAT_ID', 'ACTIVE', 'RANK'], 'integer'],
            [['MENU_CAT_NAME', 'MENU_CAT_IMAGE'], 'safe'],
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
        $query = MENU_CATEGORY::find();

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
            'MENU_CAT_ID' => $this->MENU_CAT_ID,
            'ACTIVE' => $this->ACTIVE,
            'RANK' => $this->RANK,
        ]);

        $query->andFilterWhere(['like', 'MENU_CAT_NAME', $this->MENU_CAT_NAME])
            ->andFilterWhere(['like', 'MENU_CAT_IMAGE', $this->MENU_CAT_IMAGE]);

        return $dataProvider;
    }
}
