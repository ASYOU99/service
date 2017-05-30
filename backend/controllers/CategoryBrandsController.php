<?php

namespace backend\controllers;

use Yii;
use common\models\CategoryBrands;
use backend\models\search\CategoryBrandsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\search\CategorySearch;
use backend\models\search\BrandsSearch;

/**
 * CategoryBrandsController implements the CRUD actions for CategoryBrands model.
 */
class CategoryBrandsController extends Controller
{
    public $category;
    public $brand;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all CategoryBrands models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoryBrandsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $categorys = CategorySearch::find()->orderBy('name ASC')->all();
        foreach ($categorys as $value){
            $category[$value->id] = $value->name;
        }
        $brands = BrandsSearch::find()->orderBy('name ASC')->all();
        foreach ($brands as $value){
            $brand[$value->id] = $value->name;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'category' => $category,
            'brand' => $brand,
        ]);
    }

    /**
     * Displays a single CategoryBrands model.
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
     * Creates a new CategoryBrands model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CategoryBrands();

        $categorys = CategorySearch::find()->orderBy('name ASC')->all();
        foreach ($categorys as $value){
            $category[$value->id] = $value->name;
        }
        $brands = BrandsSearch::find()->orderBy('name ASC')->all();
        foreach ($brands as $value){
            $brand[$value->id] = $value->name;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'category' => $category,
                'brand' => $brand,
            ]);
        }
    }

    /**
     * Updates an existing CategoryBrands model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $categorys = CategorySearch::find()->orderBy('name ASC')->all();
        foreach ($categorys as $value){
            $category[$value->id] = $value->name;
        }
        $brands = BrandsSearch::find()->orderBy('name ASC')->all();
        foreach ($brands as $value){
            $brand[$value->id] = $value->name;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'category' => $category,
                'brand' => $brand,
            ]);
        }
    }

    /**
     * Deletes an existing CategoryBrands model.
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
     * Finds the CategoryBrands model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CategoryBrands the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CategoryBrands::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
