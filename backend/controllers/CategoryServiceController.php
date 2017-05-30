<?php

namespace backend\controllers;

use Yii;
use common\models\CategoryService;
use backend\models\search\CategoryServiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\search\CategorySearch;
use backend\models\search\ServiceSearch;

/**
 * CategoryServiceController implements the CRUD actions for CategoryService model.
 */
class CategoryServiceController extends Controller
{
    /**
     * @inheritdoc
     */
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
     * Lists all CategoryService models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CategoryServiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $categorys = CategorySearch::find()->orderBy('name ASC')->all();
        foreach ($categorys as $value){
            $category[$value->id] = $value->name;
        }
        $services = ServiceSearch::find()->orderBy('name ASC')->all();
        foreach ($services as $value){
            $service[$value->id] = $value->name;
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'category' => $category,
            'service' => $service,
        ]);
    }

    /**
     * Displays a single CategoryService model.
     * @param integer $category_id
     * @param integer $service_id
     * @return mixed
     */
    public function actionView($category_id, $service_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($category_id, $service_id),
        ]);
    }

    /**
     * Creates a new CategoryService model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CategoryService();
        $categorys = CategorySearch::find()->orderBy('name ASC')->all();
        foreach ($categorys as $value){
            $category[$value->id] = $value->name;
        }
        $services = ServiceSearch::find()->orderBy('name ASC')->all();
        foreach ($services as $value){
            $service[$value->id] = $value->name;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'category_id' => $model->category_id, 'service_id' => $model->service_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'category' => $category,
                'service' => $service,
            ]);
        }
    }

    /**
     * Updates an existing CategoryService model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $category_id
     * @param integer $service_id
     * @return mixed
     */
    public function actionUpdate($category_id, $service_id)
    {
        $model = $this->findModel($category_id, $service_id);
        $categorys = CategorySearch::find()->orderBy('name ASC')->all();
        foreach ($categorys as $value){
            $category[$value->id] = $value->name;
        }
        $services = ServiceSearch::find()->orderBy('name ASC')->all();
        foreach ($services as $value){
            $service[$value->id] = $value->name;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'category_id' => $model->category_id, 'service_id' => $model->service_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'category' => $category,
                'service' => $service,
            ]);
        }
    }

    /**
     * Deletes an existing CategoryService model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $category_id
     * @param integer $service_id
     * @return mixed
     */
    public function actionDelete($category_id, $service_id)
    {
        $this->findModel($category_id, $service_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CategoryService model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $category_id
     * @param integer $service_id
     * @return CategoryService the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($category_id, $service_id)
    {
        if (($model = CategoryService::findOne(['category_id' => $category_id, 'service_id' => $service_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
