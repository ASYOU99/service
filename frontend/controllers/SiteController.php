<?php
namespace frontend\controllers;

use backend\models\search\CategoryBrandsSearch;

use common\models\Category;
use common\models\Firms;
use frontend\models\search\BrandsSearch;
use frontend\models\search\ModelsSearch;
use Yii;
use frontend\models\ContactForm;
use yii\web\Controller;
use yii\data\Pagination;
use frontend\models\search\FirmsCategoryBrandsSearch;
use frontend\models\search\MainCategorySearch;


/**
 * Site controller
 */
class SiteController extends Controller
{
    const PER_PAGE = 10;

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale' => [
                'class' => 'common\actions\SetLocaleAction',
                'locales' => array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    public function actionIndex()
    {
        $count = Firms::find()->count();
        return $this->render('index',[
            'count' => $count,
        ]);
    }

    public function actionCategories()
    {
        $model_main = MainCategorySearch::find()
            ->active()
            ->with(['categories' => function ($q) { $q->andWhere(['status' => 1]);}])
            ->orderBy('name ASC')
            ->all();

        $model_category=[];
        $count_firms = [];
        foreach ($model_main as $value){
            $model_category[$value->id] = $value->categories;
            foreach ($model_category[$value->id] as $cat_id){
                $count_firms[$cat_id->id] = FirmsCategoryBrandsSearch::find()
                    ->where(['category_id'=>$cat_id->id])
                    ->groupBy('firms_id')
                    ->count();
            }
        }
        return $this->render('categories', [
            'model_main' => $model_main,
            'model_category' => $model_category,
            'count_firms' => $count_firms,
        ]);
    }

    public function actionCategory($slug)
    {

        $category_id = Category::find()->select('id')->where(['slug'=>$slug])->one();
        $firms_cat_br = CategoryBrandsSearch::find()
            ->with(['categories', 'brands' => function ($q) { $q->andWhere(['status' => 1]);}])
            ->where(['category_id' => $category_id])
            ->all();
        $fms = FirmsCategoryBrandsSearch::find()->where(['category_id' => $category_id])
            ->joinWith(['firms firm'=> function ($q) { $q->andWhere(['status' => 1]);}])
            ->orderBy(['firm.prioritet' => SORT_DESC])
            ->groupBy('firms_id')
            ->all();
        $brands = [];
        $firms = [];
        $category = 0;
        //$cat_ser =CategoryServiceSearch::find()->with('service')->where(['category_id' => $category_id])->all();
        //$service = []; // TODO: включить при проектировании услуг

        foreach ($firms_cat_br as $value) {
            $category = $value->categories;
            $brands[$value->id] = $value->brands;
        }
        foreach ($fms as $f) {
           //$firms[$f->groupOrderFirms->id] = $f->groupOrderFirms;
           $firms[$f->firms->id] = $f->firms;
        }

//        foreach ($cat_ser as $val){ //TODO: включить при проектировании услуг
//            $service[$val->service->id] = $val->service;
//        }

        $test = FirmsCategoryBrandsSearch::find()->where(['category_id' => $category_id])
            ->joinWith(['firms firm'=> function ($q) { $q->andWhere(['status' => 1]);}])
            ->orderBy(['firm.prioritet' => SORT_DESC])
            ->groupBy('firms_id');
        $countQuery = clone $test;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>self::PER_PAGE,'forcePageParam' => false, 'defaultPageSize' =>self::PER_PAGE]);
        $mod = $test
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('category', [
            'mod' => $mod,
            'pages' => $pages,
            'category' => $category,
            'brands' => $brands,
            //'fms' => $fms,
            //'firms' => $firms,
            //'service' => $service,

        ]);
    }

    public function actionCategoryBrands()
    {

        $category = 0;
        $brand = 0;
        $category_id = Category::find()->select('id')->where(['slug' => Yii::$app->request->get('slug', null)])->one();//slug
        $brand_id = BrandsSearch::find()->select('id')->where(['name' => Yii::$app->request->get('name', null)])->one();//name

        $firms_cat_br = CategoryBrandsSearch::find()
            ->with('categories', 'brands')
            ->where(['category_id' => $category_id, 'brands_id' => $brand_id])
            ->all();
        $models = ModelsSearch::find()
            ->where(['id_category' => $category_id, 'id_brands' => $brand_id])
            ->all();
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

        $test = FirmsCategoryBrandsSearch::find()->where(['category_id' => $category_id,'brand_id' => $brand_id])
            ->joinWith(['firms firm'=> function ($q) { $q->andWhere(['status' => 1]);}])
            ->orderBy(['firm.prioritet' => SORT_DESC])
            ->groupBy('firms_id');
        $countQuery = clone $test;
        $pages = new Pagination(['totalCount' => $countQuery->count(),'pageSize'=>self::PER_PAGE,'forcePageParam' => false, 'defaultPageSize' =>self::PER_PAGE]);
        $mod = $test
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('category_brands', [
            'mod' => $mod,
            'pages' => $pages,
            'firms_cat_br' => $firms_cat_br,
            //'firms' => $firms,
            'category' => $category,
            'brand' => $brand,
            'models' => $models,
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options' => ['class' => 'alert-success']
                ]);
                return $this->refresh();
            } else {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => \Yii::t('frontend', 'There was an error sending email.'),
                    'options' => ['class' => 'alert-danger']
                ]);
            }
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }
}
