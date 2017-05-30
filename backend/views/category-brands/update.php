<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryBrands */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Category Brands',
]) . $model->brands->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Category-Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->brands->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="category-brands-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
        'brand' => $brand,
    ]) ?>

</div>
