<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Models;

/**
 * ModelsSearch represents the model behind the search form about `common\models\Models`.
 */
class ModelsSearch extends Models
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tovar','id_category', 'id_brands'], 'safe'],
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
        $query = Models::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'id_category' => $this->id_category,
            'id_brands' => $this->id_brands,
        ]);

        $query->andFilterWhere(['like', 'tovar', $this->tovar]);
            //->andFilterWhere(['like', 'id_category', $this->id_category])
            //>andFilterWhere(['like', 'id_brands', $this->id_brands]);

        return $dataProvider;
    }
}
