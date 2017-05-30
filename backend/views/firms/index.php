<?php

use common\grid\EnumColumn;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\FirmsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Firms');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="firms-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Firms',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            'name',
            'site',
            //'tel',
            //'info:ntext',
            'work_time',
            //'category_brands_id',
            // 'thumbnail_base_url:url',
            // 'thumbnail_path',
            'adress',
            'metro',
            //'google_maps',
            [
                'class' => EnumColumn::className(),
                'attribute' => 'status',
                'enum' => [
                    Yii::t('backend', 'Not Visible'),
                    Yii::t('backend', 'Visible')
                ]
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
