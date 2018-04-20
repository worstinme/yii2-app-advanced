<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap'=>['zoo','widgets'],
    'language'=>'ru',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'zoo' => [
            'class' => 'worstinme\zoo\Component',
            'languages' => ['ru' => 'Русский'],
            'urlRuleComponent' => [
                'item_suffix' => '/',
            ],
            'applications' => [
                [
                    'id' => 'news',
                    'title' => 'Новости',
                ],
                [
                    'id' => 'menu',
                    'title' => 'Меню',
                ],
                [
                    'id' => 'pages',
                    'title' => 'Страницы',
                    'urlRuleComponent' => [
                        'app_url' => '',
                    ],
                ],
            ],
        ],
        'widgets'=>[
            'class'=>'\worstinme\widgets\Component',
        ],
        'cart' => [
            'class' => '\worstinme\cart\Component',
            'min_sum_to_order' => 1000,
            'relationNameField' => function ($model) {
                return $model->element_name;
            },
            'relationImageField' => function ($model) {
                if (isset($model->element_images[0])) {
                    return \worstinme\zoo\helpers\ImageHelper::thumbnailFileUrl(Yii::getAlias('@frontend/web') . $model->element_images[0]['source'], 60, 40);
                }
                return null;
            },
            'relationCategoryField' => 'parentCategory.name'
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
            ],
        ],
        'formatter' => [
            'numberFormatterOptions' => [
                NumberFormatter::MIN_FRACTION_DIGITS => 0,
            ],
            'currencyCode' => 'rub',
        ],
    ],
];
