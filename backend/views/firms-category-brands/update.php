<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FirmsCategoryBrands */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Firms Category Brands',
]) . ' ' . $model->firms_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Firms Category Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->firms_id, 'url' => ['view', 'firms_id' => $model->firms_id, 'category_id' => $model->category_id, 'brand_id' => $model->brand_id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="firms-category-brands-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
