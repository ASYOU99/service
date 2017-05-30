<?php
/**
 * Created by PhpStorm.
 * User: ASYOU
 * Date: 23.03.2017
 * Time: 0:02
 */

use yii\helpers\Url;


$this->title = 'Ремонт и обслуживание техники в Москве по брендам';
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Бренды производителей техники по обслуживанию и ремонту сервисными центрами из каталога russia-services.com',
]);
?>
<div id="content" class="container">
    <h1>Официальные сервисные центры в Москве</h1>

    <?php
    //TODO: быстрая форма поиска

//    <form name="search_manufacturer" method="post" action="https://service-centers.ru/manufacturers" role="form">
//        <div id="search_manufacturer">
//            <div class="form-group"><select id="search_manufacturer_manufacturer"
//                                            name="search_manufacturer[manufacturer]" required="required"
//                                            data-autosubmit="1" data-placeholder="Быстрый поиск производителя"
//                                            class="select2-autocomplete form-control select2-hidden-accessible"
//                                            data-name="manufacturer" tabindex="-1" aria-hidden="true"></select><span
//                    class="select2 select2-container select2-container--bootstrap" dir="ltr"
//                    style="width: 1140px;"><span class="selection"><span
//                            class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true"
//                            aria-expanded="false" tabindex="0"
//                            aria-labelledby="select2-search_manufacturer_manufacturer-container"><span
//                                class="select2-selection__rendered" id="select2-search_manufacturer_manufacturer-container"><span
//                                    class="select2-selection__placeholder">Быстрый поиск производителя</span></span><span
//                                class="select2-selection__arrow" role="presentation"><b
//                                    role="presentation"></b></span></span></span><span class="dropdown-wrapper"
//                                                                                       aria-hidden="true"></span></span></div>
//            <input type="hidden" id="search_manufacturer__token" name="search_manufacturer[_token]" class="form-control"
//                   value="nzaCrnZaBeEZ8rL617TyXMBLvPEfhj6IyUw32emdDks"></div>
//    </form>

    ?>
    <h3>Алфавитный указатель производителей</h3>
    <div id="all-manufacturers">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <nav>
                    <ul class="pagination">
                        <li><a href="<?= Url::to(['brands/A'],'https') ?>">A</a></li>
                        <li><a href="<?= Url::to(['brands/B'],'https') ?>">B</a></li>
                        <li><a href="<?= Url::to(['brands/C'],'https') ?>">C</a></li>
                        <li><a href="<?= Url::to(['brands/D'],'https') ?>">D</a></li>
                        <li><a href="<?= Url::to(['brands/E'],'https') ?>">E</a></li>
                        <li><a href="<?= Url::to(['brands/F'],'https') ?>">F</a></li>
                        <li><a href="<?= Url::to(['brands/G'],'https') ?>">G</a></li>
                        <li><a href="<?= Url::to(['brands/H'],'https') ?>">H</a></li>
                        <li><a href="<?= Url::to(['brands/I'],'https') ?>">I</a></li>
                        <li><a href="<?= Url::to(['brands/J'],'https') ?>">J</a></li>
                        <li><a href="<?= Url::to(['brands/K'],'https') ?>">K</a></li>
                        <li><a href="<?= Url::to(['brands/L'],'https') ?>">L</a></li>
                        <li><a href="<?= Url::to(['brands/M'],'https') ?>">M</a></li>
                        <li><a href="<?= Url::to(['brands/N'],'https') ?>">N</a></li>
                        <li><a href="<?= Url::to(['brands/O'],'https') ?>">O</a></li>
                        <li><a href="<?= Url::to(['brands/P'],'https') ?>">P</a></li>
                        <li><a href="<?= Url::to(['brands/Q'],'https') ?>">Q</a></li>
                        <li><a href="<?= Url::to(['brands/R'],'https') ?>">R</a></li>
                        <li><a href="<?= Url::to(['brands/S'],'https') ?>">S</a></li>
                        <li><a href="<?= Url::to(['brands/T'],'https') ?>">T</a></li>
                        <li><a href="<?= Url::to(['brands/U'],'https') ?>">U</a></li>
                        <li><a href="<?= Url::to(['brands/V'],'https') ?>">V</a></li>
                        <li><a href="<?= Url::to(['brands/W'],'https') ?>">W</a></li>
                        <li><a href="<?= Url::to(['brands/X'],'https') ?>">X</a></li>
                        <li><a href="<?= Url::to(['brands/Y'],'https') ?>">Y</a></li>
                        <li><a href="<?= Url::to(['brands/Z'],'https') ?>">Z</a></li>
                        <li><a href="<?= Url::to(['brands/1'],'https') ?>">0 — 9</a></li>
                    </ul>
                </nav>
            </div>
        </div>


    </div>
</div>







