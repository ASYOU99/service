<?php

namespace backend\controllers;


use Yii;
use common\models\FirmsCategoryBrands;
use backend\models\search\FirmsCategoryBrandsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FirmsCategoryBrandsController implements the CRUD actions for FirmsCategoryBrands model.
 */
class FirmsCategoryBrandsController extends Controller
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
     * Lists all FirmsCategoryBrands models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FirmsCategoryBrandsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FirmsCategoryBrands model.
     * @param integer $firms_id
     * @param integer $category_id
     * @param integer $brand_id
     * @return mixed
     */
    public function actionView($firms_id, $category_id, $brand_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($firms_id, $category_id, $brand_id),
        ]);
    }

    /**
     * Creates a new FirmsCategoryBrands model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FirmsCategoryBrands();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'firms_id' => $model->firms_id, 'category_id' => $model->category_id, 'brand_id' => $model->brand_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FirmsCategoryBrands model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $firms_id
     * @param integer $category_id
     * @param integer $brand_id
     * @return mixed
     */
    public function actionUpdate($firms_id, $category_id, $brand_id)
    {
        $model = $this->findModel($firms_id, $category_id, $brand_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'firms_id' => $model->firms_id, 'category_id' => $model->category_id, 'brand_id' => $model->brand_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FirmsCategoryBrands model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $firms_id
     * @param integer $category_id
     * @param integer $brand_id
     * @return mixed
     */
    public function actionDelete($firms_id, $category_id, $brand_id)
    {
        $this->findModel($firms_id, $category_id, $brand_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the FirmsCategoryBrands model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $firms_id
     * @param integer $category_id
     * @param integer $brand_id
     * @return FirmsCategoryBrands the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($firms_id, $category_id, $brand_id)
    {
        if (($model = FirmsCategoryBrands::findOne(['firms_id' => $firms_id, 'category_id' => $category_id, 'brand_id' => $brand_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
