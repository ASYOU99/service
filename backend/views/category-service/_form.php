<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryService */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="category-service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?= $form->field($model, 'category_id')->dropDownList($category, ['prompt' => ''])->label(Yii::t('backend', 'Category')) ?>

    <?= $form->field($model, 'service_id')->dropDownList($service, ['prompt' => ''])->label(Yii::t('backend', 'Service')) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
