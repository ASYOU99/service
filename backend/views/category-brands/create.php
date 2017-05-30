<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CategoryBrands */

$this->title = Yii::t('backend', 'Create Category-Brands');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Category-Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-brands-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
        'brand' => $brand,
    ]) ?>

</div>
