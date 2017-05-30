<?php
namespace frontend\components\widgets;


use frontend\models\search\FirmsCategoryBrandsSearch;
use frontend\models\search\MainCategorySearch;
use yii\base\Widget;
use yii\db\Expression;

class CategoryWidget extends Widget
{
    public $message;
    private $main_id = [10,4,23];
    private $cat_id = [17,24,37,5,16,15,2,36];
    public function init()
    {

        parent::init();

    }

    public function run()
    {
        $model_main = MainCategorySearch::find()
            ->with(['categories' => function ($q){ $q->andWhere(['id' => $this->cat_id]);}])
            ->andWhere(['id'=> $this->main_id])
            ->all();
        //$model_main = MainCategorySearch::find()->with('categories')->orderBy(new Expression('rand()'))->limit(3)->all();
        $model_category=[];
        $count_firms = [];
        foreach ($model_main as $value){
            $model_category[$value->id] = $value->categories;
            foreach ($model_category[$value->id] as $cat_id){
                $count_firms[$cat_id->id] = FirmsCategoryBrandsSearch::find()->where(['category_id'=>$cat_id->id])->groupBy('firms_id')->count();
            }
        }
        return $this->render('category', [
            'model_main' => $model_main,
            'model_category' => $model_category,
            'count_firms' => $count_firms,
        ]);
    }
}