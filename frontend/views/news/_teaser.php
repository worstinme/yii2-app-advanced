<?php
/**
 * Created by PhpStorm.
 * User: worst
 * Date: 25.02.2018
 * Time: 17:19
 */

use worstinme\zoo\helpers\ImageHelper;
use yii\helpers\Html;

?>

<div class="news-teaser">
    <div class="teaser-container">
        <div class="image">
            <?= ImageHelper::thumbnailImg(Yii::getAlias('@frontend/web') . $model->element_image[0]['source'], 340, 230) ?>
        </div>
        <div class="description uk-text-left">
            <div>
                <?= $model->element_intro ?>
            </div>
        </div>
    </div>
    <h4><?=$model->element_name?></h4>
    <div class="meta">Опубликовано <?=Yii::$app->formatter->asDate($model->created_at)?></div>
</div>