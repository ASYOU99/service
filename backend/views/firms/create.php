<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Firms */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Firms',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Firms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firms-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'cat' => $cat,
        //'metro' => $metro, // TODO: add method.
        'cat_old' => $cat_old,

    ]) ?>

</div>
