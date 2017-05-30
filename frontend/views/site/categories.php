<?php
/**
 * Created by PhpStorm.
 * User: ASYOU
 * Date: 23.03.2017
 * Time: 0:02
 */
$this->title = 'Ремонт и обслуживание техники в Москве по видам техники';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Виды техники по обслуживанию и ремонту сервисными центрами из каталога russia-services.com',
]);
?>
<div id="content" class="container">
    <h1>Ремонт и обслуживание техники в Москве</h1>
    <?php
    //TODO: сделать быстрый поиск

//    <form name="search_category" method="post" action="https://service-centers.ru/categories" role="form">
//        <div id="search_category">
//            <div class="form-group"><select id="search_category_category" name="search_category[category]"
//                                            required="required" data-autosubmit="1"
//                                            data-placeholder="Быстрый поиск вида техники"
//                                            class="select2-autocomplete form-control select2-hidden-accessible"
//                                            data-name="category" tabindex="-1" aria-hidden="true"></select><span
//                    class="select2 select2-container select2-container--bootstrap" dir="ltr"
//                    style="width: 1140px;"><span class="selection"><span
//                            class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
//                            aria-expanded="false" tabindex="0"
//                            aria-labelledby="select2-search_category_category-container"><span
//                                class="select2-selection__rendered" id="select2-search_category_category-container"><span
//                                    class="select2-selection__placeholder">Быстрый поиск вида техники</span></span><span
//                                class="select2-selection__arrow" role="presentation"><b
//                                    role="presentation"></b></span></span></span><span class="dropdown-wrapper"
//                                                                                       aria-hidden="true"></span></span></div>
//            <input type="hidden" id="search_category__token" name="search_category[_token]" class="form-control"
//                   value="8W1HisSjrZFHSvX577cEvqGw6rtePt084Z7KJukuSTA"></div>
//    </form>
    ?>
    <div id="categories">
        <?php foreach ($model_main as $main){?>
            <?if(!empty($main->categories)):?>
        <div class="col-xs-12 headline">
            <h2><?php echo $main->name?></h2>
        </div>
            <div class="row">
                <div class="hidden-xs col-md-4">
                        <?php if ($main->thumbnail_path): ?>
                            <?php echo \yii\helpers\Html::img($main->thumbnail_base_url.'/'.$main->thumbnail_path,
                                        ['class' => 'img-responsive', 'alt'=>"Ремонт ". $main->name." в Москве"]
                                    ) ?>
                        <?php endif; ?>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <?php foreach ($model_category[$main->id] as $categ){?>
                            <?php if (($count_firms[$categ->id]) != 0):?>
                        <div class="col-xs-6 category empty">
                            <a href="<?= \yii\helpers\Url::to(['site/category', 'slug' => $categ->slug],'https')?>">Ремонт <?php echo $categ->name_morphy?></a>
                        </div>
                                <div class="hidden-xs2 col-xs-6 count">
                                    <?php echo $count_firms[$categ->id]?> сервисных центра
                                </div>
                            <?php  endif;?>
                        <?php }?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php }?>
    </div>

</div>

