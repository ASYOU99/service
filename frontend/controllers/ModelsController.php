<?php

namespace frontend\controllers;


use backend\models\search\CategoryBrandsSearch;
use common\models\Brands;
use common\models\Category;
use common\models\Models;
use frontend\models\search\FirmsCategoryBrandsSearch;
use frontend\models\search\ModelsSearch;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;

class ModelsController extends Controller
{
    const PER_PAGE = 10;
    /**
     * @return string
     */
    public function actionIndex()
    {
        $category = 0;
        $brand = 0;
        $firms =[];
        $category_id = Category::find()->select('id')->where(['slug'=>Yii::$app->request->get('slug', null)])->one();
        $brand_id = Brands::find()->select('id')->where(['name'=>Yii::$app->request->get('name', null)])->one();

        $models = Models::find()->where(['tovar'=>Yii::$app->request->get('model', null)])->one();


        $firms_cat_br = CategoryBrandsSearch::find()->with('categories', 'brands')
            ->where(['category_id' => $category_id, 'brands_id' => $brand_id])->all();

        $fms = FirmsCategoryBrandsSearch::find()
            ->where(['category_id' => $category_id, 'brand_id' => $brand_id])
            ->joinWith(['firms firm'=> function ($q) { $q->andWhere(['status' => 1]);}])
            ->orderBy(['firm.prioritet' => SORT_DESC])
            ->groupBy('firms_id')
            ->all();

        foreach ($firms_cat_br as $value) {
            $category = $value->categories;
            $brand = $value->brands;
        }

        foreach ($fms as $f) {
            //$firms[$f->groupOrderFirms->id] = $f->groupOrderFirms;
            $firms[$f->firms->id] = $f->firms;
        }

        $test = FirmsCategoryBrandsSearch::find() ->where(['category_id' => $category_id, 'brand_id' => $brand_id])
            ->joinWith(['firms firm'=> function ($q) { $q->andWhere(['status' => 1]);}])
            ->orderBy(['firm.prioritet' => SORT_DESC])
            ->groupBy('firms_id');
        $countQuery = clone $test;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>self::PER_PAGE,'forcePageParam' => false, 'defaultPageSize' =>self::PER_PAGE]);
        $mod = $test
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index',[
            'mod' => $mod,
            'pages' => $pages,
            'category'=>$category,
            'brand'=>$brand,
            'models'=>$models,
            'firms'=>$firms,
        ]);
    }

    public function actionView()
    {

        return $this->render('view');
    }

}
