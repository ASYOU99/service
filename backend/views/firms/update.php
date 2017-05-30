<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Firms */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Firms',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Firms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="firms-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'cat' => $cat,
        'cat_old' => $cat_old,
        //'metro' => $metro

    ]) ?>

</div>
