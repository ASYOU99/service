<?php


use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\web\JsExpression;


/* @var $this yii\web\View */
/* @var $model common\models\Firms */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="firms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description')->textarea(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'site')->textarea(['maxlength' => true]) ?>

    <?php if(!$model->isNewRecord) {
        $model->category_brands_id = $cat_old;
    } ?>
    <?= $form->field($model,'category_brands_id')->checkboxList($cat) ?>

    <?php echo $form->field($model, 'tel')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'info')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options' => [
                'minHeight' => 400,
                'maxHeight' => 400,
                'buttonSource' => true,
                'convertDivs' => false,
                'removeEmptyTags' => false,
                'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
            ]
        ]
    ) ?>
    <?php echo $form->field($model, 'thumbnail')->widget(
        Upload::className(),
        [
            'url' => ['/file-storage/upload'],
            'maxFileSize' => 1000000, // 1 MiB
            'acceptFileTypes' => new JsExpression('/(\.|\/)(jpe?g|png)$/i'),
        ])->label('Логотип')->hint('Типы:png,jpg,jpeg. Размер должен быть 150*150');
    ?>
    <?php echo $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>

<!--    --><?php //echo $form->field($model, 'metro')->hint('Можно выбрать несколько станций')->widget(Select2::classname(), [
//    'data' => $metro,
//    'language' => 'ru',
//    'options' => ['multiple' => true,'placeholder' => 'Выберите метро ...'], // TODO: add relation with metromodel.
//    'pluginOptions' => [
//    'allowClear' => true
//    ],
//    ]);?>
    <?php echo $form->field($model, 'work_time')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'metro')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'prioritet')->textInput(['maxlength' => true])->hint('Чем больше цифра тем выше стоит фирма в поиске по сайту по совпадающим запросам') ?>

    <?php echo $form->field($model, 'google_maps')->textarea(['maxlength' => true])->hint('Вставлять не ссылку, а код карты вида'.htmlspecialchars("<iframe></iframe>".' размером 350*300')) ?>

    <?php echo $form->field($model, 'status')->checkbox()->label('Видимость')->hint('Если стоит галочка то видимый') ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
