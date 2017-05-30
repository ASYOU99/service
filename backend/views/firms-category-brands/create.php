<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FirmsCategoryBrands */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Firms Category Brands',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Firms Category Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firms-category-brands-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
