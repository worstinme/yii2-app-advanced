<?php


use worstinme\zoo\helpers\ImageHelper;
use worstinme\zoo\models\Items;
use yii\helpers\Html;

$news = Items::find()->where(['app_id' => 'news', 'state' => 1])->limit(3)->orderBy('created_at DESC')->all();

?>

<?= Yii::$app->widgets->renderPosition('interiors')?>

<div id="news" class="uk-text-center uk-margin-bottom">
    <h2>Новости и акции</h2>
    <div class="uk-grid uk-child-width-1-3@m" uk-grid>
        <?php foreach ($news as $model) : ?>
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
        <?php endforeach; ?>
    </div>
</div>

