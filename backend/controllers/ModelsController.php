<?php

namespace backend\controllers;

use common\models\Brands;
use common\models\Category;
use Yii;
use common\models\Models;
use backend\models\search\ModelsSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ModelsController implements the CRUD actions for Models model.
 */
class ModelsController extends Controller
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
     * Lists all Models models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModelsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Models model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Models model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $search = [' ','  ','/','\\','+'];
        $i = 0;
        $session = Yii::$app->session;
        $model = new Models();
        $cat = Category::find()->orderBy("name ASC")->all();
        foreach ($cat as $value) {
            $category[$value->id] = $value->name;
        }
        $br = Brands::find()->orderBy("name ASC")->all();
        foreach ($br as $value) {
            $brands[$value->id] = $value->name;
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $array = str_replace($search, '-', (array_map('strtolower', explode(PHP_EOL, $model->tovar))));
                //$array = preg_replace('/[^a-z0-9-()]*/gu', '-', $array);
                //$array = str_replace('--', '-',$array);
                $search_db = Models::find()->where(['id_category' => $model->id_category,
                    'id_brands' => $model->id_brands,])->asArray()->all();
                $search_db = ArrayHelper::map($search_db,'id','tovar');
                foreach ($array as $tovar) {
                    if(in_array($tovar,$search_db)){
                        $session->addFlash('dublicat', 'Модель '.$tovar.' уже существует</br>');

                    } else {
                        $newmodel = new Models;
                        $newmodel->tovar = trim(strtolower($tovar));
                        $newmodel->id_category = $model->id_category;
                        $newmodel->id_brands = $model->id_brands;
                        $newmodel->save();
                        $i++;
                    }
                }
                $session->addFlash('success', 'Добавлено '.$i.' товаров');
            }
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'category' => $category,
                'brands' => $brands,
            ]);
        }
    }

    /**
     * Updates an existing Models model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $search = [' ','/','\\'];
        $i = 0;
        $session = Yii::$app->session;
        $model = $this->findModel($id);
        $cat = Category::find()->orderBy("name ASC")->all();
        foreach ($cat as $value) {
            $category[$value->id] = $value->name;
        }
        $br = Brands::find()->orderBy("name ASC")->all();
        foreach ($br as $value) {
            $brands[$value->id] = $value->name;
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $array = str_replace($search, '-', (array_map('strtolower', explode(PHP_EOL, $model->tovar))));
                $search_db = Models::find()->where(['id_category' => $model->id_category,
                    'id_brands' => $model->id_brands,])->asArray()->all();
                $search_db = ArrayHelper::map($search_db,'id','tovar');
                foreach ($array as $tovar) {
                    if(in_array($tovar,$search_db)){
                        $session->addFlash('dublicat', 'Модель '.$tovar.' уже существует</br>');

                    } else {
                        $newmodel = new Models;
                        $newmodel->tovar = trim(strtolower($tovar));
                        $newmodel->id_category = $model->id_category;
                        $newmodel->id_brands = $model->id_brands;
                        $newmodel->save();
                        $i++;
                    }
                }
                $session->addFlash('success', 'Добавлено '.$i.' товаров');
            }
            //if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'category' => $category,
                'brands' => $brands,
            ]);
        }
    }

    /**
     * Deletes an existing Models model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLists($id)
    {

        $cat_brands = Category::find()->with('brands')->where(['id' => $id])->all();

        foreach ($cat_brands as $category) {
            foreach ($category->brands as $brand) {
                echo "<option value='" . $brand->id . "'>" . $brand->name . "</option>";
            }
        }

//        $countBrands = \common\models\Category::find()->with('brands')
//            ->where(['id' => $id])
//            ->count();
//
//        $categorys = \common\models\Category::find()->with('brands')
//            ->where(['id' => $id])
//            ->orderBy('id ASC')
//            ->all();
//
//        if ($countBrands > 0) {
//            foreach ($categorys as $category) {
//                echo "<option value='" . $category->id . "'>".$category->name."</option>";
//            }
//        } else {
//            echo "<option>-</option>";
//        }
    }

    /**
     * Finds the Models model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Models the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Models::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
