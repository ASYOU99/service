<?php

namespace backend\controllers;

use common\models\FirmsCategoryBrands;
use common\models\Metro;
use Yii;
use common\models\Firms;
use backend\models\search\FirmsSearch;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Category;
use yii\web\UploadedFile;

/**
 * FirmsController implements the CRUD actions for Firms model.
 */
class FirmsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Firms models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FirmsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $cat_brands = Category::find()->with('brands')->orderBy('name ASC')->all();
        $cat = [];
        foreach ($cat_brands as $category) {
//            $cat[$category->name] = [];
            foreach ($category->brands as $brand) {
                $id = $category->id . '-' . $brand->id;
                $cat[$id] = Html::encode($brand->name);
            }
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cat' => $cat,
        ]);
    }

    /**
     * Displays a single Firms model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Firms model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Firms();
        $cat_brands = Category::find()->with('brands')->orderBy('name ASC')->all();
        $cat = [];
        foreach ($cat_brands as $category) {
            foreach ($category->brands as $brand) {
                $id = $category->id . '-' . $brand->id;
                $cat[$id] = Html::encode($category->name).'-'.($brand->name);
            }
        }
//        $metro = [];
//        $under = Metro::find()->orderBy('name ASC')->all();
//        foreach($under as $value) { //TODO: add metro relation method.
//            $id = $value->name;
//            $metro[$id] = Html::encode($value->name);
//        }

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }
        $firms_cat_br =FirmsCategoryBrands::find()->where(['firms_id' => $model->id])->all();
        $cat_old = [];
        foreach ($firms_cat_br as $value){
            $cat_old[] = $value->category_id . '-' . $value->brand_id;
        }
        if ($model->load(Yii::$app->request->post())) {
            //$model->thumbnail = UploadedFile::getInstance($model, 'thumbnail');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }


        else {
            return $this->render('create', [
                'model' => $model,
                'cat' => $cat,
                'cat_old' => $cat_old,
                //'metro' => $metro, // TODO: add metro relation method.
            ]);
        }
    }

    /**
     * Updates an existing Firms model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $cat_brands = Category::find()->with('brands')->orderBy('name ASC')->all();
        $cat = [];
        foreach ($cat_brands as $category) {
//            $cat[$category->name] = [];
            foreach ($category->brands as $brand) {
                $id = $category->id . '-' . $brand->id;
                $cat[$id] = Html::encode($category->name).'-'.($brand->name);
            }
        }
        $firms_cat_br =FirmsCategoryBrands::find()->where(['firms_id' => $model->id])->all();
        $cat_old = [];
        foreach ($firms_cat_br as $value){
            $cat_old[] = $value->category_id . '-' . $value->brand_id;
        }
//        $metro = [];
//        $under = Metro::find()->orderBy('name ASC')->all();
//        foreach($under as $value) {
//            $id = $value->name; // TODO: add metro relation.
//            $metro[$id] = Html::encode($value->name);
//        }


//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }

        if ($model->load(Yii::$app->request->post())) {
            //$model->thumbnail = UploadedFile::getInstance($model, 'thumbnail');
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        else {
            return $this->render('update', [
                'model' => $model,
                'cat' => $cat,
                'cat_old' => $cat_old,
                //'metro' => $metro,
            ]);
        }
    }

    /**
     * Deletes an existing Firms model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Firms model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Firms the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Firms::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
