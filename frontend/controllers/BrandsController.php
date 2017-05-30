<?php

namespace frontend\controllers;


use frontend\models\search\BrandsSearch;
use frontend\models\search\FirmsCategoryBrandsSearch;
use frontend\models\search\FirmsSearch;
use Yii;
use yii\data\Pagination;
use yii\db\Expression;
use yii\web\Controller;

class BrandsController extends Controller
{
    const PER_PAGE = 10;
    public function actionIndex()
    {
        $litera = Yii::$app->request->get('litera', null);
        if ($litera == '1') {
            $brands = BrandsSearch::find()
                ->joinWith(['firmsCategoryBrands'])->select(new Expression('*,COUNT(firms_category_brands.firms_id) as firms_count'))
                ->where(['or like', 'name', ['0%','1%','2%','3%','4%','5%','6%','7%','8%','9%'], false])->orderBy('name')->groupBy('brands.id')->all();
        } else {
            $brands = BrandsSearch::find()
                ->joinWith(['firmsCategoryBrands'])->select(new Expression('*,COUNT(firms_category_brands.firms_id) as firms_count'))
                ->where(new Expression('name LIKE :name', [':name'=>$litera.'%']))->orderBy('name')->groupBy('brands.id')->all();
        }

        return $this->render('index', [
            'brands' => $brands,
            'litera' => $litera,
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }

    public function actionBrand()
    {
        $brand_id = BrandsSearch::find()->select('id')->where(['name' => Yii::$app->request->get('name', null)])->one();//name
        $firms_cat_br = FirmsCategoryBrandsSearch::find()->with('category', 'brand')->where(['brand_id' => $brand_id])->all();
        $firm = [];
        $category = [];
        $firms = 0;
        $brands = 0;
        foreach ($firms_cat_br as $value) {
            $firm[$value->firms_id] = $value->firms_id;
            $brands = $value->brand;
            foreach ($brands->category as $cat_brands) {
                $category[$cat_brands->id] = $cat_brands;
            }
            $firms = FirmsSearch::find()->where(['id' => $firm])->orderBy('prioritet DESC')->all();
        }

        $test = FirmsSearch::find()->where(['id' => $firm])->orderBy('prioritet DESC');
        $countQuery = clone $test;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>self::PER_PAGE,'forcePageParam' => false, 'defaultPageSize' =>self::PER_PAGE]);
        $mod = $test
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('brand', [
            'mod' => $mod,
            'pages' => $pages,
            'firms' => $firms,
            'category' => $category,
            'brands' => $brands,
        ]);
    }

}
