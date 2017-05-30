<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Models */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Models',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="models-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'category' => $category,
        'brands' => $brands,
    ]) ?>

</div>
