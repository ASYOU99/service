<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\service */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Service',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Services'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
