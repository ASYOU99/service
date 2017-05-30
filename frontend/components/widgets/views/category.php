<div class="quick-links">
    <div class="row">
        <?php use yii\helpers\Html;

        foreach ($model_main as $main):?>
        <div class="col-md-4">
            <h3><?php echo $main->name?></h3>
            <ul class="list-unstyled categories">
            <?php foreach ($model_category[$main->id] as $category):?>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['site/category', 'slug' => $category->slug],'https')?>">Ремонт <?php echo $category->name_morphy?></a>
                    <small>(<?php echo $count_firms[$category->id]?> сервис-центров)</small>
                </li>
            <?php endforeach;?>
            </ul>
        </div>
        <?php endforeach;?>
    </div>
    <a href="<?= \yii\helpers\Url::to(['categories'])?>" class="btn btn-primary all-equipment">Посмотреть все виды техники</a>
</div>

