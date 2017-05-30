<?php


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Models */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="models-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'id_category')->dropDownList($category, ['prompt' => 'Выберите категорию',
    'onchange'=>'
                $.post( "/models/lists?id='.'"+$(this).val(), function( data ) {
                  $("select#models-id_brands").html( data );
                  $("select#models-id_brands").attr("disabled", false);
                });'
    ]) ?>

    <?php echo $form->field($model, 'id_brands')->dropDownList($brands, ['prompt' => 'Выберите бренд', 'disabled' => true]) ?>

    <?php echo $form->field($model, 'tovar')->hint(Yii::t('backend', 'Enter the list of models by pressing the "Enter"'),['class'=>'text-danger'])->textarea()->label(Yii::t('backend', 'Tovar')) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
