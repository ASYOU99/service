<?php
/**
 * Created by PhpStorm.
 * User: ASYOU
 * Date: 23.03.2017
 * Time: 0:02
 */
$this->registerMetaTag([
    'name' => 'description',
    'content' => $firm->description
]);

$this->title = $firm->title;
?>
<div id="ruki-iz-plech">
    <div id="center" class="container">
        <h1>
            <?php if ($firm->thumbnail_path): ?>
                <?php echo \yii\helpers\Html::img($firm->thumbnail_base_url.'/'.$firm->thumbnail_path,
                    ['class' => 'img-responsive', 'alt'=>$firm->name." в Москве"]
                ) ?>
            <?php endif; ?>
            <?php echo $firm->name ?>
        </h1>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-8">
                <a href="tel:<?php echo $firm->tel ?>" class="phone"><?php echo $firm->tel ?></a>
                    <?php
                    //TODO:: плюшки

//                    <h3 class="red">Бесплатная диагностика</h3>
//                <div class="alert alert-warning">
//                    <h3>Выезд курьера</h3>
//                    <div>Приедем прямо к вам домой или в офис и примем в ремонт сломанную технику, а после ремонта
//                        привезём обратно. Это очень удобно!
//                    </div>
//                    <div class="mb-20">Проживаете за МКАД? Приедем за дополнительные 30 руб/км.</div>
                    ?>
                    <div id="addresses">
                        <h3><?php echo $firm->metro ?></h3>
                        <h3>  <?=\yii\helpers\Html::a('Перейти на сайт', $firm->site, ['target' => '_blank'])?></h3>
<!--                            <span class="label label-orange">new</span></h3>--><?php //TODO:: сделать привязку цвета кружка к линии станции?>
                        <p><?php echo $firm->adress ?></p>
                        <?php
                        //TODO:: нужен ли блок как проехать?

                        //<div id="how-to-go-1" style="display:none">
                        //Выходите из метро, идите во двор со шлагбаумом. Заходите во внутренний двор и поворачивайте
                        //    налево. Затем поворачивайте направо. Идите по двору прямо вдоль зеленого забора. Идите прямо
                         //   к двухэтажному зданию. Вы у цели.
                        //</div>
                        //
                        //
                        ?>
                        <p><?php echo $firm->work_time ?></p>
                    </div>
                <div><?php echo $firm->info ?></div>
     <?php //TODO: плюшки-текст?>
<!--                <div class="headline"><h3>Интересует ремонт --><?php //echo "<h1>НАЗАНИЕ КАТЕГОРИИ</h1>"?><!--?</h3></div>-->
<!--                <p><i class="fa fa-check green fa-2x"></i> Мы вам поможем! У нас работают отличные специалисты по-->
<!--                    ремонту --><?php //echo "<h1>НАЗАНИЕ КАТЕГОРИИ</h1>"?><!--. Собственный склад запчастей, гарантия на работы 1 год. Звоните по-->
<!--                    телефону --><?php //echo $firm->tel ?><!-- и мы подробно проконсультируем вас по стоимости работ и условиям-->
<!--                    обслуживания.</p>-->
<!--                <h4 class="red">Диагностика бесплатно!<sup>*</sup></h4>-->
<!--                <p><sup>*</sup> совершенно бесплатно выясним, что случилось с вашей техникой</p>-->
            </div>
            <div class="hidden-xs hidden-sm col-md-3 col-lg-4" id="map-container">
                <div id="map"><?php echo $firm->google_maps ;?></div>
                <div class="mb-30">Курьерская доставка по всей Москве</div>
            </div>
        </div>
        <?php
        //TODO:: блок плюшек и бонусов
//        <div class="row">
//            <div class="col-md-8">
//                <div class="advantages">
//                    <ul class="list-unstyled fa-ul">
//                        <li><i class="fa-li fa fa-plus"></i>Более 100 опытных сервисных инженеров</li>
//                        <li><i class="fa-li fa fa-plus"></i>Клиенты оценивают сервис на 4,7 из 5</li>
//                        <li><i class="fa-li fa fa-plus"></i>Гарантия на работы 1 год</li>
//                        <li><i class="fa-li fa fa-plus"></i>Наличие 90% запчастей на собственном складе</li>
//                    </ul>
//                </div>
//            </div>
//            <div class="col-md-4">
//                <div class="advantages">
//                    <ul class="list-unstyled fa-ul">
//                        <li><i class="fa-li fa fa-plus"></i>Срочный ремонт</li>
//                        <li><i class="fa-li fa fa-plus"></i>Бесплатная диагностика</li>
//                        <li><i class="fa-li fa fa-plus"></i>Выезд мастера</li>
//                        <li><i class="fa-li fa fa-plus"></i>Вызов курьера</li>
//                    </ul>
//                </div>
//            </div>
//        </div>
        ?>
        <div class="headline"><h3>Мы также ремонтируем</h3></div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php foreach ($main as $main_cat):?>
                    <div class="col-md-4">
                        <h4><?php echo $main_cat->name?></h4>
                        <?php foreach ($main_cat->categories as $cat):?>
                            <span class="fa fa-wrench icon-left"></span>
                            <?php echo $cat->name."</br>"?>
                        <?php endforeach;?>
                    </div>
                   <?php endforeach;?>
                </div>
            </div>
        </div>
        <div class="text-center alert alert-warning">
            <a href="tel:<?php echo $firm->tel ;?>" class="phone"><?php echo $firm->tel ;?></a>
        </div>
    </div>
</div>


