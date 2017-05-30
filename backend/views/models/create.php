<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Models */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Models',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Models'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'category' => $category,
        'brands' => $brands,
    ]) ?>

</div>
