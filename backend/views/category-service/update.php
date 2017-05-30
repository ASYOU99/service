<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryService */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Category Service',
]) . $model->service->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Category-Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->service->name, 'url' => ['view', 'category_id' => $model->category_id, 'service_id' => $model->service_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="category-service-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
        'service' => $service,
    ]) ?>

</div>
