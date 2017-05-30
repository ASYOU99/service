<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Firms;

/**
 * FirmsSearch represents the model behind the search form about `common\models\Firms`.
 */
class FirmsSearch extends Firms
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','prioritet'], 'integer'],
            [['name','site', 'tel', 'info', 'work_time', 'thumbnail_base_url', 'thumbnail_path', 'adress', 'metro', 'google_maps'], 'safe'],
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
        $query = Firms::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'prioritet' => $this->prioritet,
            'category_brands_id' => $this->category_brands_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'site', $this->site])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'work_time', $this->work_time])
            ->andFilterWhere(['like', 'thumbnail_base_url', $this->thumbnail_base_url])
            ->andFilterWhere(['like', 'thumbnail_path', $this->thumbnail_path])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'metro', $this->metro])
            ->andFilterWhere(['like', 'google_maps', $this->google_maps]);

        return $dataProvider;
    }
}
