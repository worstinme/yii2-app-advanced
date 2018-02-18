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
        'zoo'=>[
            'class'=>'\worstinme\zoo\Component',
        ],
        'widgets'=>[
            'class'=>'\worstinme\widgets\Component',
        ],
    ],
];
