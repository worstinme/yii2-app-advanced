<?php

use worstinme\zoo\frontend\models\Categories;
use yii\helpers\Html;

$categories  = Categories::findAll(['state'=>1,'app_id'=>'menu']);

?>

<div class="uk-card uk-card-default uk-card-body">
    <ul class="uk-nav-default uk-nav-parent-icon" uk-nav>
        <li class="uk-nav-header">Категории меню</li>
        <?php foreach ($categories as $cat): ?>
            <li>
                <?= Html::a($cat->name . ' / <span class="count">' . $cat->getItems()->count() . '</span>', $cat->url, [
                    'class' => $cat->id == $active ? 'uk-active' : null,
                    'data' => [
                        'pjax' => 1,
                        'method' => 'post',
                        'params' => [
                            $searchModel->formName() . "[element_category]" => $cat->id
                        ],
                    ]
                ]) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
