<?php

use yii\helpers\Html;
use yii\widgets\ListView;

\worstinme\zoo\widgets\MetaTags::widget(['model' => $model]);

?>

<div class="uk-margin-top uk-margin-bottom">

    <h1 class="uk-text-center"><?=$model->name?></h1>

    <div class="uk-grid" uk-grid>
        <div class="uk-width-1-4@m">
            <?=$this->render('_nav',['searchModel'=>$searchModel,'active'=>0])?>
        </div>
        <div class="uk-width-expand@m">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'options' => ['class' => 'uk-text-center uk-grid uk-grid-medium uk-grid-match uk-child-width-1-3@m', 'uk-grid' => true, 'uk-height-match' => "target: > div > div .teaser-content"],
                'summaryOptions' => ['class' => 'uk-width-1-1'],
                'layout' => '{items}',
                'itemView' => '_teaser',
            ]); ?>
        </div>
    </div>
</div>