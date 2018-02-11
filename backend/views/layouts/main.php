<?php

/* @var $this \yii\web\View */

/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="admin">
<?php $this->beginBody() ?>
<div class="adminnav uk-light uk-navbar-container">
    <div class="uk-container uk-container-expand">
        <nav class="uk-navbar" uk-navbar>
            <a href="/" class="uk-navbar-item uk-logo"><i uk-icon="icon: nut"></i></a>
            <div class="uk-navbar-left">
                <?= \yii\widgets\Menu::widget([
                    'options' => ['class' => 'uk-navbar-nav uk-hidden-small'],
                    'activeCssClass' => 'uk-active',
                    'submenuTemplate' => "\n<div class=\"uk-navbar-dropdown\">\n<ul class=\"uk-nav uk-navbar-dropdown-nav\">\n{items}\n</ul>\n</div>\n",
                    'items' => [
                        ['label'=>'Content','url'=>['/zoo/applications/index']],
                        ['label'=>'Widgets','url'=>['/widgets/default/index']],
                    ],
                ]); ?>
            </div>
            <div class="uk-navbar-right">
                <?= \yii\widgets\Menu::widget([
                    'options' => ['class' => 'uk-navbar-nav uk-hidden-small'],
                    'items' => [
                        [
                            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'template' => '<a href="{url}" data-method="post">{label}</a>',
                        ]
                    ],
                ]); ?>
            </div>
        </nav>
    </div>
</div>

<?php if (Yii::$app->controller->module->id == 'zoo') : ?>
    <?= $content ?>
<?php else: ?>
    <div class="uk-container uk-container-expand">
        <?= $content ?>
    </div>
<?php endif; ?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
