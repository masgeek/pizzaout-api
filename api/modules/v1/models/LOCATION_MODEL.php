<?php
/**
 * Created by PhpStorm.
 * User: RONIN
 * Date: 12/30/2017
 * Time: 1:40 AM
 */

namespace app\api\modules\v1\models;


use app\models\Location;
use yii\data\ActiveDataProvider;

class LOCATION_MODEL extends Location
{
    public function rules()
    {
        $rules =  parent::rules();
        return $rules;
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
        $query = LOCATION_MODEL::find();

        // add conditions that should always apply here
        $query->where(['ACTIVE' => true]);

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
            'LOCATION_ID' => $this->LOCATION_ID,
            'CITY_ID' => $this->CITY_ID,
        ]);

        $query->andFilterWhere(['like', 'LOCATION_NAME', $this->LOCATION_NAME])
            ->andFilterWhere(['like', 'ADDRESS', $this->ADDRESS]);

        return $dataProvider;
    }
}