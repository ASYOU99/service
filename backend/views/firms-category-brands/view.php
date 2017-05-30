<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FirmsCategoryBrands */

$this->title = $model->firms_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Firms Category Brands'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firms-category-brands-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'firms_id' => $model->firms_id, 'category_id' => $model->category_id, 'brand_id' => $model->brand_id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'firms_id' => $model->firms_id, 'category_id' => $model->category_id, 'brand_id' => $model->brand_id], [
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
            'firms_id',
            'category_id',
            'brand_id',
        ],
    ]) ?>

</div>
