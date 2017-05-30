<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Firms */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Firms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firms-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php $test = \yii\helpers\Html::img(
        Yii::$app->glide->createSignedUrl([
            'glide/index',
            'path' => $model->thumbnail_path,
            'w' => 200
        ], true),
        ['class' => 'article-thumb img-rounded pull-left']
    )?>
    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'title',
            'description',
            'site',
            'tel',
            [
                'attribute'=>'info',
                'contentOptions'=>['style'=>'max-width: 550px;']
            ],
            //'category_brands_id',
            //'thumbnail_base_url:url',
            //'thumbnail_path',
            [
                'attribute'=>'thumbnail',
                'value'=>$model->thumbnail_base_url.'/'.$model->thumbnail_path,
                'format' => ['image',['width'=>'150','height'=>'150']],
            ],

            'adress',
            'work_time',
            'prioritet',
            'metro',
            [
                'attribute'=>'google_maps',
                'contentOptions'=>['style'=>'max-width: 550px;word-wrap: break-word;']
            ],
            [
                'value'=> function($model)
                {
                    return $model->getStatusName();
                },
                'attribute' => 'status',
            ],
        ],
    ]) ?>

</div>
