<?php
return [
    'class' => 'yii\web\UrlManager',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [

                    'categories'=>'site/categories',
                    'view'=>'brands/view',
                    'firms/<id:\d+>'=>'firms/view',
                    'brands/<litera:\w>'=>'brands/index',

                    [
                        'pattern' => 'brands/<name>/<page:\d+>',
                        'route' => 'brands/brand',
                        'defaults' => ['page' => ''],
                    ],
                    [
                        'pattern' => '<slug>/<page:\d+>',
                        'route' => 'site/category',
                        'defaults' => ['page' => ''],
                    ],
                    [
                        'pattern' => '<slug>/<name>/<page:\d+>',
                        'route' => 'site/category-brands',
                        'defaults' => ['page' => ''],
                    ],

                    [
                        'pattern' => '<slug>/<name>/<model>/<page:\d+>',
                        'route' => 'models/index',
                        'defaults' => ['page' => ''],
                    ],

                    ''=>'site/index',

        ]
];
