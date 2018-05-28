<?php

use yii\helpers\Html;
use yii\widgets\ListView;

\worstinme\zoo\widgets\MetaTags::widget(['model' => $model]);

?>

<div class="uk-margin-top uk-margin-bottom">

    <h1><?= $model->name ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'uk-text-center uk-grid uk-grid-medium uk-grid-match uk-child-width-1-3@m', 'uk-grid' => true, 'uk-height-match' => "target: > div .teaser-content"],
        'summaryOptions' => ['class' => 'uk-width-1-1'],
        'layout' => '{items}',
        'itemView' => '_teaser',
    ]); ?>

</div>