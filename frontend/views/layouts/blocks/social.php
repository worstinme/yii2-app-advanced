<?php


echo \yii\widgets\Menu::widget([
    'options' => ['class' => 'uk-navbar-nav social-nav'],
    'encodeLabels' => false,
    'items' => [
        ['label' => '<i class="fab fa-facebook-f"></i>', 'url' => '#'],
        ['label' => '<i class="fab fa-vimeo-v"></i>', 'url' => '#'],
        ['label' => '<i class="fab fa-twitter"></i>', 'url' => '#'],
        ['label' => '<i class="fab fa-instagram"></i>', 'url' => '#'],
    ],
]);