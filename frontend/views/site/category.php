<?php
/* @var $this yii\web\View */
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $category->description,
]);
?>
<div id="content" class="container">
    <?php
    $this->title = $category->title;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('common', 'Categories'), 'url' => ['categories']];
    $this->params['breadcrumbs'][] = "Ремонт " . mb_strtolower($category->name_morphy,'UTF-8');
    ?>
    <h1><?php echo Html::encode("Ремонт " . mb_strtolower($category->name_morphy,'UTF-8')) ?></h1>

    <div class="h4">Выберите производителя, чтобы уточнить поиск</div>
    <ul class="nav nav-pills">
        <?php // Задаем сколько брендов выводится ссылками (все остальные идут в дропдаун)
        $first = array_slice($brands, 0, 3);
        $second = array_slice($brands, 3);
        ?>
        <?php foreach ($first as $brand):
            $br_name = strtolower($brand->name);
            ?>
            <li>
                <a href='<?= \yii\helpers\Url::to(["$category->slug/$br_name"],'https')?>'><?php echo $brand->name?></a>
            </li>
<!--            public static function a($text, $url = null, $options = [])-->
<!--            {-->
<!--            if ($url !== null) {-->
<!--            $options['href'] = Url::to($url);-->
<!--            }-->
<!--            return static::tag('a', $text, $options);-->
<!--            }-->
<!--            @ASYOU99-->
<!--            * If you want to use an absolute url you can call [[Url::to()]] yourself, before passing the URL to this method,-->
<!--            * like this:-->
<!--            *-->
<!--            * ```php-->
<!--            * Html::a('link text', Url::to($url, true))-->
<!--            *-->
        <?php endforeach; ?>
        <li>
            <?php
            echo Select2::widget([
                'name' => $category->id,
                'data' => ArrayHelper::map($second, 'name', 'name'),
                'size' => Select2::MEDIUM,
                'options' => [
                    'placeholder' => 'Выберите бренд ...',
                    'multiple' => false
                ],
                'pluginEvents' => [
                'select2:select' => "function() {
                    window.location.href = '/$category->slug/' + $(this).val().toLowerCase();                   
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