<?php

namespace frontend\controllers;

use frontend\models\search\FirmsCategoryBrandsSearch;
use frontend\models\search\FirmsSearch;
use frontend\models\search\MainCategorySearch;
use yii\web\Controller;

class FirmsController extends Controller
{

    public $category = [];
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id = 0)
    {
        $firm =FirmsSearch::find()->where(['id' => $id])->one();
        $firms_cat_br =FirmsCategoryBrandsSearch::find()->select('category_id')->with('category')->where(['firms_id' => $id])->all();

        $main = [];
        $test_id = 0;
        foreach ($firms_cat_br as $value){
            $test_id = $value->category_id;
            $category = $value->category;
            $main[$category->main_category_id] = MainCategorySearch::find()
                ->with(['categories' => function ($q) use ($test_id) { $q->andWhere(['id' => $test_id]);}])
                ->where(['id' => $category->main_category_id])
                ->one();
        }


        return $this->render('view',[
            'firm' => $firm,
            'main' => $main,
        ]);
    }

}
