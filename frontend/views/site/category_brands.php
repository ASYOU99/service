<?php
/* @var $this yii\web\View */
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

if($pages->totalCount != 0):

$this->registerMetaTag([
    'name' => 'description',
    'content' => $firms_cat_br['0']->description,
]);

?>
<div id="content" class="container">
    <?php

    $this->title = $firms_cat_br[0]->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Categories'), 'url' => ['categories']];
    $this->params['breadcrumbs'][] = ['label' => "Ремонт " . mb_strtolower($category->name_morphy,'UTF-8'), 'url' => ['site/category', 'slug' => $category->slug]];
    $this->params['breadcrumbs'][] = $brand->name;
    ?>
    <h1><?php echo Html::encode("Ремонт " . mb_strtolower($category->name_morphy,'UTF-8').' '.$brand->name) ?></h1>

    <div class="h4">Выберите модель, чтобы уточнить поиск</div>
    <ul class="nav nav-pills">
        <?php // Задаем сколько моделей выводится ссылками (все остальные идут в дропдаун)
        $first = array_slice($models, 0, 3);
        $second = array_slice($models, 3);
        $br_name = strtolower($brand->name);
        ?>
        <?php foreach ($first as $model): ?>
            <li>
                <a href='<?= \yii\helpers\Url::to(["$category->slug/$br_name/$model->tovar"],'https')?>'><?php echo str_replace('_', ' ', ($model->tovar))?></a>
            </li>
        <?php endforeach; ?>
        <li>
            <?php
            echo Select2::widget([
                'id' => $brand->id,
                'name' => $category->id,
                //'name' => $brand->id,
                'data' => ArrayHelper::map($second, 'tovar', 'tovar'),
                'size' => Select2::MEDIUM,
                'options' => [
                    'placeholder' => 'Выберите модель ...',
                    'multiple' => false
                ],
                'pluginEvents' => [
                    'select2:select' => "function() {
                        window.location.href = '/$category->slug/$br_name/' + $(this).val().toLowerCase();     
                      }"
                ]
            ]);
            ?>
        </li>
    </ul>
    <?php
    // TODO: здесь сделать цикл усуг связанных с категорией
    ?>
    <!--    <div class="sub-navigation">-->
    <!--        <div class="h2">Услуги по ремонту и обслуживанию -->
    <?php //echo mb_strtolower($category->name)?><!--</div>-->
    <!--        <ul class="nav nav-pills">-->
    <!--            --><?php //foreach ($service as $servic):?>
    <!--            <li><a href="-->
    <? //= \yii\helpers\Url::to(['category_brands_service/index','category_id'=>$category->id,'brands_id'=>$brand->id,'service_id'=>$servic->id])?><!--">-->
    <?php //echo $servic->name?><!--</a>-->
    <!--            --><?php //endforeach ;?>
    <!--        </ul>-->
    <!--    </div>-->
    <?php echo $this->render('/_list-firms', [
        //'firms' => $firms,
        'mod' => $mod,
        'pages' => $pages,
    ]) ?>
    <?php
    // TODO: сделать рендомные 4 категории на выбор и дополнительные услуги если нужны

    //    <div class="h4">Что ещё отремонтировать</div>
    //    <ul class="nav nav-pills nav-list">
    //        <li>
    //            <a href="https://service-centers.ru/coffee-machines" class="pill">Ремонт кофемашин</a>
    //        </li>
    //        <li>
    //            <a href="https://service-centers.ru/projectors" class="pill">Ремонт проекторов</a>
    //        </li>
    //        <li>
    //            <a href="https://service-centers.ru/tablets" class="pill">Ремонт планшетов</a>
    //        </li>
    //        <li>
    //            <a href="https://service-centers.ru/digital-photocameras" class="pill">Ремонт цифровых фотоаппаратов</a>
    //        </li>
    //    </ul>
    //    <div class="h4">Дополнительные услуги</div>
    //    <ul class="nav nav-pills nav-list">
    //        <li><a href="https://service-centers.ru/services/buyout/mobile" class="pill">Скупка телефонов и планшетов</a>
    //        </li>
    //    </ul>

    ?>
</div>
<?php else: ?>
<h1>
    <div class="alert alert-info" role="alert">Извините в эту категорию еще не добавлены фирмы</div>
</h1>
<?php endif; ?>