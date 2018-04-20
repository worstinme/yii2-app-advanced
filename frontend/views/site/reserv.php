<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use common\widgets\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Забронировать столик';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class="uk-text-center"><?= $this->title ?></h1>

<?php if (Yii::$app->session->hasFlash('reserved')) : ?>

    <?=Yii::$app->widgets->renderPosition('reserved')?>

<?php else: ?>

    <?php $form = ActiveForm::begin(['action' => ['site/reserv'], 'options' => ['class'=>'uk-form-small','data-pjax' => true]]) ?>

    <div class="uk-grid uk-grid-small uk-child-width-1-5@m" uk-grid>

        <div><?= $form->field($model, 'name')->textInput(['class' => 'uk-input', 'placeholder' => 'Ваше имя'])->label(false) ?></div>

        <div>
            <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '+7 (999) 999-99-99',
                'options' => [
                    'placeholder' => 'Ваш номер телефона', 'class' => 'uk-input',
                ],
            ])->label(false) ?>
        </div>

        <div><?= $form->field($model, 'email')->textInput(['class' => 'uk-input', 'placeholder' => 'Ваш email'])->label(false) ?></div>

        <div><?= $form->field($model, 'restoran')->dropDownList(Yii::$app->params['restaurants'], ['class' => 'uk-select', 'prompt' => 'Ресторан'])->label(false) ?></div>

        <div><?= $form->field($model, 'booking_date')->textInput(['class' => 'uk-input', 'placeholder' => 'Ваш email'])->label(false) ?></div>

        <div class="uk-width-1-1 comment">
            <?= $form->field($model, 'comment')->textarea(['class' => 'uk-textarea', 'placeholder' => 'Комментарий к заказу (время и другие пожелания)'])->label(false) ?>
        </div>

        <div class="uk-width-1-1 uk-text-center">

            <?= $form->field($model, 'agreement')->checkbox(['class' => 'uk-checkbox']) ?>

            <?= Html::submitButton('Забронировать', ['class' => 'uk-button uk-button-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end() ?>

<?php endif; ?>
