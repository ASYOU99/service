
<?php
/* @var $this yii\web\View */
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php
if($pages->totalCount != 0):

$this->registerMetaTag([
    'name' => 'description',
    'content' => $brands->description,
]);
?>
<div id="content" class="container">
    <?php
    //$this->title = "Ремонт " . $brands->name;
    $this->title = $brands->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Brands'), 'url' => ['view']];
    $this->params['breadcrumbs'][] = "Сервисные центры ".$brands->name;
    //$this->params['breadcrumbs'][] = $this->title;
    ?>
<!--    <h1>--><?php //echo Html::encode($this->title) ?><!--</h1>-->

    <div class="h4">Выберите категорию, чтобы уточнить поиск</div>
    <ul class="nav nav-pills">
        <?php // Задаем сколько брендов выводится ссылками (все остальные идут в дропдаун)
        $first = array_slice($category, 0, 3);
        $second = array_slice($category, 3);
        $br_name = strtolower($brands->name);
        ?>
        <?php foreach ($first as $cat):?>
            <li>
                <a href='<?= Url::to(["$cat->slug/$br_name"],'https')?>'><?php echo $cat->name?></a>
            </li>
        <?php endforeach; ?>
        <li>
            <?php
            echo Select2::widget([
                'name' => $brands->name,
                'data' => ArrayHelper::map($second, 'slug', 'name'),
                'size' => Select2::MEDIUM,
                'options' => [
                    'placeholder' => 'Выберите категорию ...',
                    'multiple' => false
                ],
                'pluginEvents' => [
                    'select2:select' => "function() {
                    window.location.href = '/'+$(this).val() + '/' + $(this).attr('name').toLowerCase(); 
                      }"
                ]
            ]);
            ?>
        </li>
    </ul>
    <?php echo $this->render('/_list-firms_br', [
        //'firms' => $firms,
        'mod' => $mod,
        'pages' => $pages,
    ]) ?>

</div>
<?php else: ?>
<h1>
    <div class="alert alert-info" role="alert">Извините в эту категорию еще не добавлены фирмы</div>
</h1>
<?php endif; ?>
