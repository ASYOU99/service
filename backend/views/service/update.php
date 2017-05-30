<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\service */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Service',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="service-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
