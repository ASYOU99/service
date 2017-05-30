<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Metro */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Metro',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Metros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="metro-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
