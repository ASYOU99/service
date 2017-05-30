<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
        <div class="clearfix">
            <div id="found-count" class="pull-left">
                <span class="fa fa-search fa-2x icon-left hidden-xs"></span>
                Найдено <?php use yii\helpers\Html;
                use yii\widgets\LinkPager;

                echo $pages->totalCount; ?> сервис-центров
            </div>
        </div>
        <div id="centers-list" data-path="mobilephones">
            <div id="centers-container">
                <?php foreach ($mod as $firm) { ?>
                    <div class="card grouped view-brief">
                        <div class="clearfix">
                            <div class="row">
                                <div class="col-xs-12 col-md-9">
                                    <div class="title clearfix">
                                        <div class="h4"><a
                                                href='<?= \yii\helpers\Url::to(["firms/".$firm->firms->id],'https')?>'><?php echo $firm->firms->name ?></a>
                                        </div>
                                    </div>
                                    <?php
                                    // TODO: здесь сделать доп услуги

                                    // <ul class="list-inline features hidden-xs">
                                    //   <li><span title=""
                                    //     data-original-title="Возможен срочный ремонт, в том числе в присутствии клиента">срочный ремонт</span>
                                    //    </li>
                                    //   <li><span title="" data-original-title="Возможен выезд мастера на дом">выезд мастера</span>
                                    //    </li>
                                    //    <li><span title="" data-original-title="Предусмотрена бесплатная диагностика"> бесплатная диагностика</span>
                                    //     </li>
                                    //</ul>
                                    ?>

                                    <?php
                                    // TODO: здесь сделать отзывы и фото

                                    ?>

                                </div>
                                <div class="hidden-xs hidden-sm col-md-3">
                                    <div class="text-right">
                                        <?php if ($firm->firms->thumbnail_path): ?>
                                            <?php echo \yii\helpers\Html::img($firm->firms->thumbnail_base_url.'/'.$firm->firms->thumbnail_path,
                                                ['class' => 'logo img-responsive', 'alt' => $firm->firms->name . " в Москве"]
                                            ) ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="addresses">
                            <?php
                            // TODO: здесь если у центра есть филиалы то выводим это

                            //                                <div class="header">
                            //                                    <i class="fa fa-map-marker icon-left hidden-xs"></i>Сеть из 2 сервисных центров
                            //                                </div>
                            //------Добавляем после первого списка ul если есть другие филиалы//
                            //                                <ul class="fa-ul others">
                            //                                        <li>
                            //                                            <i class="fa-li fa fa-circle"></i>
                            //                                            <div class="row">
                            //                                                <div class="col-md-8">
                            //                                Москва, ул. Маршала Бирюзова, д. 1
                            //                                <div class="work-time">
                            //
                            //
                            //                                                        <div class="red" data-original-title="" title="">
                            //                                                            <i class="fa fa-clock-o icon-left"></i><span>Откроется в 09:00</span>
                            //                                                        </div>
                            //
                            //
                            //                                                    </div>
                            //                                                    <div class="work-time-full hidden">
                            //                                                        <div class="work-time-full-content">
                            //
                            //
                            //                                Будни: с 09<sup>00</sup> до 21<sup>00</sup><br>
                            //
                            //                                Суббота: с 10<sup>00</sup> до 20<sup>00</sup><br>
                            //
                            //                                Воскресенье: с 10<sup>00</sup> до 20<sup>00</sup><br>
                            //
                            //
                            //                                                            <div>Звоните с 7:00 до 24:00. Недорогой курьер.</div>
                            //                                                        </div>
                            //                                                    </div>
                            //                                                </div>
                            //                                                <div class="col-md-4">
                            //                                                    <div class="metro">
                            //                                                        <ul class="list-inline">
                            //                                                            <li>
                            //                                                                <i class="fa fa-circle" style="color: #B61D8E"></i> м.
                            //                                Октябрьское поле
                            //                                </li>
                            //
                            //                                                        </ul>
                            //                                                    </div>
                            //                                                    <div class="delivery pull-right">Приедем к вам!</div>
                            //                                                </div>
                            //                                            </div>
                            //                                        </li>
                            //                                    </ul>
                            //                                    <a href="" class="more-addresses">Показать
                            //                                        остальные адреса<span class="fa fa-caret-down icon-right"></span></a>
                            ///
                            ?>
                            <div class="list">
                                <ul class="fa-ul">
                                    <li>
<!--                                        <i class="fa-li fa fa-circle"></i>-->
                                        <div class="row">
                                            <div class="col-md-8">
                                                <?php echo $firm->firms->adress; ?>
<!--                                                <div class="work-time">-->
<!--                                                    <div class="red" data-original-title="" title="">-->
<!--                                                        <i class="fa fa-clock-o icon-left"></i><span>Откроется в 09:00</span>-->
<!--                                                    </div>-->
<!--                                                </div>-->
                                                <div class="work-time-full">
                                                    <div class="work-time-full-content">
                                                        <?php echo $firm->firms->work_time; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="metro">
                                                    <ul class="list-inline">
                                                        <li>
                                                            <?php
                                                            //TODO: сделать привязку цвета линии метро к цвету кружка
                                                            //<i class="fa fa-circle" style="color: #029A55"></i>
                                                            ?>
                                                            <?php echo $firm->firms->metro ?>
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="delivery pull-right">Приедем к вам!</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>
                        <?php
                        // TODO: здесь сделать какой центр что ремонтирует по категории (если только опрееленные телефоны то написать что только их а не все)

                        //                            <ul class="list-unstyled cl">
                        //                                <li>
                        //                                    <i class="fa fa-wrench icon-left hidden-xs"></i>
                        //                            Ремонт любых мобильных телефонов
                        //                            </li>
                        //                            </ul>
                        ?>

                        <?php
                        //TODO: сделать плюсы фирмы

                        //                            <div class="advantages">
                        //                                <ul class="list-unstyled fa-ul">
                        //                                    <li><i class="fa-li fa fa-plus"></i>Более 100 сервисных инженеров</li>
                        //                                    <li><i class="fa-li fa fa-plus"></i>Клиенты оценивают сервис на 4,7 из 5</li>
                        //                                    <li><i class="fa-li fa fa-plus"></i>Гарантия на работы 1 год</li>
                        //                                    <li><i class="fa-li fa fa-plus"></i>Наличие 90% запчастей на собственном складе</li>
                        //                                </ul>
                        //                            </div>
                        ?>

                        <div class="open-phone">
                            <a href="tel:<?php echo $firm->firms->tel; ?>" class="phone btn btn-primary btn-lg "
                            ><i class="fa fa-phone"></i><?php echo $firm->firms->tel; ?></a>
                        </div>
                        <?php
                        //TODO:: сделать возможность жаловаться на СЦ

                        //                            <div class="pull-right">
                        //                                <button class="btn btn-default btn-lg btn-complaint hidden-xs hidden-sm"
                        //                                        data-original-title="Пожаловаться на сервисный центр"><span
                        //                                        class="fa fa-exclamation-triangle"></span></button>
                        //                            </div>
                        ?>

                    </div>
                <?php } ?>
            </div>
        </div>
        <?php echo LinkPager::widget([
        'pagination' => $pages,

        ]);?>
    </div>

    <div class="col-xs-12 col-md-4 col-md-4 col-lg-4">

        <div id="sidebar" class="hidden-xs hidden-sm">
            <?php
            // TODO: сделать дополнительные фильтра по доп услугам

            //                <div id="filters">
            //                    <div class="section">
            //                        <div class="h4">Время работы</div>
            //                        <div class="checkbox">
            //                            <label><input type="checkbox" class="filter-checkbox" data-name="work-before-10"
            //                                          autocomplete="off" value="/mobilephones?work-before-10=1"> до 10:00</label>
            //                        </div>
            //                        <div class="checkbox">
            //                            <label><input type="checkbox" class="filter-checkbox" data-name="work-after-19"
            //                                          autocomplete="off" value="/mobilephones?work-after-19=1"> после 19:00</label>
            //                        </div>
            //                        <div class="checkbox">
            //                            <label><input type="checkbox" class="filter-checkbox" data-name="24h" autocomplete="off"
            //                                          value="/mobilephones?24h=1"> круглосуточно</label>
            //                        </div>
            //                    </div>
            //
            //                    <div class="section">
            //                        <div class="h4">Для вашего удобства</div>
            //                        <div class="checkbox">
            //                            <label><input type="checkbox" class="filter-checkbox" data-name="at-home" autocomplete="off"
            //                                          value="/mobilephones?at-home=1"> выезд мастера</label>
            //                        </div>
            //                        <div class="checkbox">
            //                            <label><input type="checkbox" class="filter-checkbox" data-name="has-delivery"
            //                                          autocomplete="off" value="/mobilephones?has-delivery=1"> вызов курьера</label>
            //                        </div>
            //                        <div class="checkbox">
            //                            <label><input type="checkbox" class="filter-checkbox" data-name="free-diagnostics"
            //                                          autocomplete="off" value="/mobilephones?free-diagnostics=1"> бесплатная
            //                                диагностика</label>
            //                        </div>
            //                        <div class="checkbox">
            //                            <label><input type="checkbox" class="filter-checkbox" data-name="urgent" autocomplete="off"
            //                                          value="/mobilephones?urgent=1"> срочный ремонт</label>
            //                        </div>
            //                    </div>
            //
            //                </div>
            ?>
        </div>
    </div>
</div>