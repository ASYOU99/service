<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CategoryBrands */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="category-brands-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'category_id')->dropDownList($category, ['prompt' => 'Выберите категорию'])->label(Yii::t('backend', 'Category')) ?>

    <?php echo $form->field($model, 'brands_id')->dropDownList($brand, ['prompt' => 'Выберите бренд'])->label(Yii::t('backend', 'Brands')) ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
