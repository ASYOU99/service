<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryService */

$this->title = $model->service->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Category-Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-service-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'category_id' => $model->category_id, 'service_id' => $model->service_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'category_id' => $model->category_id, 'service_id' => $model->service_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'category_id',
                'value'=> function($model)
                {
                    return $model->category->name;
                },
                'label' => 'Категория',
            ],
            [
                'attribute' => 'service_id',
                'value'=> function($model)
                {
                    return $model->service->name;
                },
                'label' => 'Услуга',
            ],
        ],
    ]) ?>

</div>
