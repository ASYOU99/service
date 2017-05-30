<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FirmsCategoryBrands as FirmsCategoryBrandsModel;

/**
 * FirmsCategoryBrands represents the model behind the search form about `common\models\FirmsCategoryBrands`.
 */
class FirmsCategoryBrandsSearch extends FirmsCategoryBrandsModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firms_id', 'category_id', 'brand_id'], 'integer'],
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
    public function search($params) //это просто серч модель можно сделать так
    {
        $query = FirmsCategoryBrandsModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'firms_id' => $this->firms_id,
            'category_id' => $this->category_id,
            'brand_id' => $this->brand_id,
        ]);

        return $dataProvider;
    }
}
