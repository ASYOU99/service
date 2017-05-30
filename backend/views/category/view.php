<?php

use common\grid\EnumColumn;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

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

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'title',
            'description',
            'name_morphy',
            //'main_category_id',
            [
                'attribute' => 'main_category_id',
                'value'=> function($model)
                {
                    return $model->mainCategory->name;
                },
                'label' => 'Родительская категория',
            ],
            'slug',
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
