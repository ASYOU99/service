<?php
/* @var $this yii\web\View */
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
$this->registerMetaTag([
    'name' => 'description',
    'content' => "Качественное обслуживание и ремонт ".$category->name_morphy.' '.strtolower($brand->name).' '.str_replace('_',' ',$models->tovar)." в сервис-центре в Москве. Сервисные центры по ремонту " .$category->name_morphy.' '.strtolower($brand->name).' '.str_replace('_',' ',$models->tovar). " с ценами и адресами.",
]);
?>
<div id="content" class="container">
    <?php

    $this->title = "Ремонт ".$category->name_morphy.' '.strtolower($brand->name).' '.str_replace('_',' ',$models->tovar)." в сервисном центре " .$brand->name." в Москве";
    $this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Categories'), 'url' => ['/site/categories']];
    $this->params['breadcrumbs'][] = ['label' => "Ремонт " . mb_strtolower($category->name_morphy,'UTF-8'), 'url' => ['site/category', 'slug' => $category->slug]];
    $this->params['breadcrumbs'][] = ['label' => $brand->name, 'url' => [$category->slug.'/'.strtolower($brand->name)]];
    $this->params['breadcrumbs'][] = str_replace('_',' ',$models->tovar);
    ?>
    <h1><?php echo Html::encode('Ремонт '.$category->name_morphy.' '.$brand->name.' '.str_replace('_',' ',$models->tovar)) ?></h1>
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