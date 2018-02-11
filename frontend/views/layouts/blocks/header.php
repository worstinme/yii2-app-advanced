<?php
/**
 * Created by PhpStorm.
 * User: worst
 * Date: 01.02.2018
 * Time: 16:37
 */

use yii\helpers\Html;

?>


<header id="header">
    <div class="mainnav uk-navbar-container">
        <div class="uk-container">
            <nav class="uk-navbar" uk-navbar>
                <a href="" class="uk-navbar-item uk-logo">LOGO</a>
                <div class="uk-navbar-left">
                    <?= \yii\widgets\Menu::widget([
                        'options' => ['class' => 'uk-navbar-nav uk-hidden-small'],
                        'activeCssClass' => 'uk-active',
                        'submenuTemplate' => "\n<div class=\"uk-navbar-dropdown\">\n<ul class=\"uk-nav uk-navbar-dropdown-nav\">\n{items}\n</ul>\n</div>\n",
                        'items' => [
                            ['label' => 'Главная', 'url' => ['/site/index']],
                            ['label' => 'О нас', 'url' => ['/site/about'],'items'=>[
                                ['label' => 'Связаться', 'url' => ['/site/contact']],
                            ]],
                        ],
                    ]); ?>
                </div>
                <div class="uk-navbar-right">
                    <?php if (Yii::$app->user->isGuest) : ?>
                        <?= \yii\widgets\Menu::widget([
                            'options' => ['class' => 'uk-navbar-nav uk-hidden-small'],
                            'items' => [
                                ['label' => 'Вход', 'url' => ['/site/login']],
                                ['label' => 'Регистрация', 'url' => ['/site/signup']]
                            ],
                        ]); ?>
                    <?php else: ?>
                        <?= \yii\widgets\Menu::widget([
                            'options' => ['class' => 'uk-navbar-nav uk-hidden-small'],
                            'items' => [
                                [
                                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                    'url' => ['/site/logout'],
                                    'template' => '<a data-method="post" href="{url}">{label}</a>',
                                ]
                            ],
                        ]); ?>
                    <?php endif; ?>

                </div>
            </nav>
        </div>
    </div>
</header>

