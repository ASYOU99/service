<?php
/* @var $this yii\web\View */
use frontend\components\widgets\CategoryWidget;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = "Каталог сервисных центров в Москве. $count сервисных центра по ремонту техники";
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Список московских сервисных центров по ремонту техники. Сравнивайте цены, находите близлежащие к вам, выбирайте специалистов',
]);
$this->registerMetaTag([
    'name' => 'yandex-verification',
    'content' => '284e2494902936b7',
]);
$this->registerMetaTag([
    'name' => 'wmail-verification',
    'content' => 'a0c44e9108af7b1896ef444f283daff3',
]);
?>
<body>

<div id="homepage-intro">
    <div class="container">
        <div class="text">
            <h1>Поиск сервисного центра</h1>
            <h2>в Москве</h2>
        </div>
    </div>
</div>
<?php
//TODO: сделать быстрый поиск

//<form class="form-inline">
//    <div class="form-group">
//        <input type="text" class="form-control" id="manufacturer" placeholder="Выберите производителя">
//    </div>
//    <div class="form-group">
//        <input type="email" class="form-control" id="equipment" placeholder="Выберите вид техники">
//    </div>
//    <button type="submit" class="btn btn-default search">Найти</button>
//</form>
?>


<div class="container catalog">
    <?= CategoryWidget::widget() ?>
    <div class="quick-links">
        <div class="row">
            <div class="col-md-3">
                <a href="<?= Url::to(['/brands/acer'],'https') ?>" class="thumbnail"><img
                        src="/images/acer.png"
                        alt="Сервисные центры Acer в Москве" title="Сервисные центры Acer в Москве"></a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['brands/xiaomi'],'https') ?>" class="thumbnail"><img
                        src="/images/xiaomi.png"
                        alt="Сервисные центры Xiaomi в Москве" title="Сервисные центры Xiaomi в Москве"></a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['brands/asus'],'https') ?>" class="thumbnail"><img
                        src="/images/asus.jpg"
                        alt="Сервисные центры Asus в Москве" title="Сервисные центры Asus в Москве"></a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['brands/meizu'],'https') ?>" class="thumbnail"><img
                        src="/images/meizu.png"
                        alt="Сервисные центры Meizu в Москве" title="Сервисные центры Meizu в Москве"></a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['brands/huawei'],'https') ?>" class="thumbnail"><img
                        src="/images/huawei.jpg"
                        alt="Сервисные центры Huawei в Москве" title="Сервисные центры Huawei в Москве"></a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['brands/lenovo'],'https') ?>" class="thumbnail"><img
                        src="/images/lenovo.gif"
                        alt="Сервисные центры Lenovo в Москве" title="Сервисные центры Lenovo в Москве"></a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['brands/lg'],'https') ?>" class="thumbnail"><img
                        src="/images/lg.png"
                        alt="Сервисные центры LG в Москве" title="Сервисные центры LG в Москве"></a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['brands/nokia'],'https') ?>" class="thumbnail"><img
                        src="/images/nokia.gif"
                        alt="Сервисные центры Nokia в Москве" title="Сервисные центры Nokia в Москве"></a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['brands/panasonic'],'https') ?>" class="thumbnail"><img
                        src="/images/panasonic.jpg"
                        alt="Сервисные центры Panasonic в Москве" title="Сервисные центры Panasonic в Москве"></a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['brands/philips'],'https') ?>" class="thumbnail"><img
                        src="/images/philips.jpg"
                        alt="Сервисные центры Philips в Москве" title="Сервисные центры Philips в Москве"></a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['brands/hp'],'https') ?>" class="thumbnail"><img
                        src="/images/hp.png"
                        alt="Сервисные центры HP в Москве" title="Сервисные центры HP в Москве"></a>
            </div>
            <div class="col-md-3">
                <a href="<?= Url::to(['brands/sony'],'https') ?>" class="thumbnail"><img
                        src="/images/sony.png"
                        alt="Сервисные центры Sony в Москве" title="Сервисные центры Sony в Москве"></a>
            </div>
        </div>

        <a href="<?= Url::to('view','https')?>" class="btn btn-primary">Посмотреть всех производителей в алфавитном порядке</a>
    </div>

<?php
//TODO: факты о сайте

//<div id="facts" class="hidden-xs">
//        <h3>Факты о сайте</h3>
//
//        <div class="row">
//            <div class="col-sm-4">
//                <div class="counters">
//                    <span class="counter">517</span>
//                    <h4>Городов</h4>
//                </div>
//            </div>
//            <div class="col-sm-4">
//                <div class="counters">
//                    <span class="counter">19187</span>
//                    <h4>Сервисных центров</h4>
//                </div>
//            </div>
//            <div class="col-sm-4">
//                <div class="counters">
//                    <span class="counter">66269</span>
//                    <h4>Обращений</h4>
//                </div>
//            </div>
//        </div>
//    </div>

?>
</div>
<!--<div id="footer">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
</body>
