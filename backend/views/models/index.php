<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ModelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Models');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i><?php echo Yii::t('backend', 'Saved')?></h4>
            <?php foreach (Yii::$app->session->getFlash('success') as $value){
                echo $value;
            }
            ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::$app->session->hasFlash('dublicat')): ?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h4><i class="icon fa fa-check"></i><?php echo Yii::t('backend', 'Attention')?></h4>
            <?php foreach (Yii::$app->session->getFlash('dublicat') as $value){
                echo $value;
            }
            ?>
        </div>
    <?php endif; ?>
    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Models',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'header' => (Yii::t('backend', 'Category')),
                'attribute' => 'id_category',
                'value' => 'idCategories.name',
                //'filter' => $category,
            ],
            [
                'header' => (Yii::t('backend', 'Brands')),
                'attribute' => 'id_brands',
                'value' => 'idBrands.name',
                //'filter' => $brands,
            ],
            [
                'header' => (Yii::t('backend', 'Tovar')),
                'attribute' => 'tovar',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
