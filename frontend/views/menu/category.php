<?php

use yii\helpers\Html;
use yii\widgets\ListView;

\worstinme\zoo\widgets\MetaTags::widget(['model' => $category]);

?>

<div class="uk-margin-top uk-margin-bottom">

    <h1 class="uk-text-center">Наше меню / <?=$category->name?></h1>

    <div class="uk-grid" uk-grid>
        <div class="uk-width-1-4@m">
            <?=$this->render('_nav',['searchModel'=>$searchModel,'active'=>$category->id])?>
        </div>
        <div class="uk-width-expand@m">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'options' => ['class' => 'uk-text-center uk-grid uk-grid-medium uk-grid-match uk-child-width-1-3@m', 'uk-grid' => true, 'uk-height-match' => "target: > div .teaser-content"],
                'summaryOptions' => ['class' => 'uk-width-1-1'],
                'layout' => '{items}',
                'itemView' => '_teaser',
            ]); ?>
        </div>
    </div>
</div>