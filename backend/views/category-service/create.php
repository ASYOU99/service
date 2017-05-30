<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CategoryService */

$this->title = Yii::t('backend', 'Create Category-Service');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Category-Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'category' => $category,
        'service' => $service,
    ]) ?>

</div>
