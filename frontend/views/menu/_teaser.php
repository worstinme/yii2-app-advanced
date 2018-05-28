<?php
/**
 * Created by PhpStorm.
 * User: worst
 * Date: 25.02.2018
 * Time: 17:19
 */

use worstinme\zoo\helpers\ImageHelper;

?>

<div class="menu-teaser">
    <div class="teaser-container">
        <div class="image">
            <?php if (!empty($model->element_images[0])) : ?>
                <?= ImageHelper::thumbnailImg(Yii::getAlias('@webroot') . $model->element_images[0]['source'], 243, 217, ImageHelper::THUMBNAIL_OUTBOUND, [
                    'alt' => $model->element_images[0]['alt'] ?? '',
                    'title' => $model->element_images[0]['title'] ?? '',
                ]) ?>
            <?php endif; ?>
        </div>
        <div class="teaser-content">
            <h4><?= $model->name ?></h4>
            <div class="price">
                <?= Yii::$app->formatter->asCurrency($model->element_price) ?>
            </div>
            <div>
                <?= \worstinme\cart\widgets\BuyButton::widget(['model_id' => $model->id, 'model_price' => $model->element_price]) ?>
            </div>
        </div>
    </div>
</div>

<?php $script = <<<JS

$(document)
    .on("cart:ordered",".cart-widget",function(data, response){
    
        if (response.amount > 0) {
            $(".cart-state > div").html('<a href="/cart/">В корзине <strong>'+response.amount+'</strong> товаров<br>На сумму <strong>'+response.sum+'</strong></a>');
        } else {
            $(".cart-state > div").html('Корзина пуста<br><a href="/menu/">Закажите что-нибудь!</a>');
        }
        
        UIkit.notification({
            message: response.success? 'Добавлено! <a href="/cart/" uk-toggle="target: #cart-modal">Перейти в корзину</a>':'Не удалось обновить корзину',
            status: response.success ? 'success' : 'danger',
            pos: 'top-center',
            timeout: 5000
        });
        
        console.log('reloaded');
            
    })

JS;

$this->registerJs($script, $this::POS_READY) ?>