<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryBrands */

$this->title = $model->brands->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'CategoryBrands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-brands-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
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
            'id',
            'title',
            'description',
            //'category_id',
            [
                'attribute' => 'category_id',
                'value'=> function($model)
                {
                    return $model->categories->name;
                },
                'label' => 'Категория',
            ],
            [
                'attribute' => 'brands_id',
                'value'=> function($model)
                {
                    return $model->brands->name;
                },
                'label' => 'Бренд',
            ],
        ],
    ]) ?>

</div>
