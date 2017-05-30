<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<div class="wrap">
    <?php
    NavBar::begin([
        //'brandLabel' => Yii::$app->name,
       'brandLabel' =>"<img src='/images/logo.png'><span class='brand_name'>".Yii::$app->name."</span>",
        //Html::span('@web/images/logo.png', ['alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('frontend', 'Home'), 'url' => '/'],
        //['label' => 'Ремонт', 'url' => ['/site/categories']],
        //['label' => 'Бренды', 'url' => ['/site/brands-alphabet']],
        //['label' => 'Бренды-А', 'url' => ['/site/brands-a']],
        //['label' => 'Бренд', 'url' => ['/site/brand']],
        //['label' => 'Другие услуги', 'url' => ['/site/other']],
        //['label' => 'Быстрая заявка на ремонт', 'url' => ['/site/contact']],
        //['label' => 'Карт-фирм', 'url' => ['/site/firm']],
        //['label' => 'Рем-моб', 'url' => ['/site/category']],
        //['label' => Yii::t('frontend', 'Articles'), 'url' => ['/article/index']],


    ];
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,

    ]);
    NavBar::end();
    ?>
<!--    --><?php //NavBar::begin();
//    echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => [
//            ['label' => 'Москва','options'=>['class'=>'city'],'url' => ['/site/city']],
//            ['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
//            ['label' => Yii::t('frontend', 'Articles'), 'url' => ['/article/index']],
//            ['label' => 'Добавить сервисный центр', 'url' => ['/site/new_center']],
//            ['label' => Yii::t('frontend', 'Contact'), 'url' => ['/site/contact']],
//            [
//                'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
//                'visible'=>!Yii::$app->user->isGuest,
//                'items'=>[
//                    [
//                        'label' => Yii::t('frontend', 'Settings'),
//                        'url' => ['/user/default/index']
//                    ],
//                    [
//                        'label' => Yii::t('frontend', 'Backend'),
//                        'url' => Yii::getAlias('@backendUrl'),
//                        'visible'=>Yii::$app->user->can('manager')
//                    ],
//                    [
//                        'label' => Yii::t('frontend', 'Logout'),
//                        'url' => ['/user/sign-in/logout'],
//                        'linkOptions' => ['data-method' => 'post']
//                    ]
//                ]
//            ],
//            [
//                'label'=>Yii::t('frontend', 'Language'),
//                'items'=>array_map(function ($code) {
//                    return [
//                        'label' => Yii::$app->params['availableLocales'][$code],
//                        'url' => ['/site/set-locale', 'locale'=>$code],
//                        'active' => Yii::$app->language === $code
//                    ];
//                }, array_keys(Yii::$app->params['availableLocales']))
//            ]
//        ],
//
//    ]);
//    ?>
<!--    --><?php //NavBar::end(); ?>
<!--    <div class="text-menu">Ваш город:</div>-->
<!--    <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>-->
    <?php echo $content ?>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Russia-Services <?php echo date('Y') ?></p>
    </div>
</footer>
<?php $this->endContent() ?>