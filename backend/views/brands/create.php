<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Brands */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Brands',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brands-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
