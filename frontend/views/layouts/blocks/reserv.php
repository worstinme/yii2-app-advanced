<?php
/**
 * Created by PhpStorm.
 * User: worst
 * Date: 26.03.2018
 * Time: 19:51
 */

use common\widgets\ActiveForm;
use frontend\models\Reserv;
use yii\helpers\Html;
use yii\widgets\Pjax;

$model = new Reserv();

?>

    <h2 class="uk-text-center">Забронировать столик</h2>


<?php $form = ActiveForm::begin(['action' => ['site/reserv'], 'options' => ['data-pjax' => true]]) ?>

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

        <div><?= $form->field($model, 'booking_date')->textInput(['class' => 'uk-input', 'placeholder' => 'Дата и время'])->label(false) ?></div>

        <div class="uk-width-1-1 comment">
            <?= $form->field($model, 'comment')->textarea(['class' => 'uk-textarea', 'placeholder' => 'Комментарий к заказу (время и другие пожелания)'])->label(false) ?>
        </div>

        <div class="uk-width-1-1 uk-text-center">

            <?= $form->field($model, 'agreement')->checkbox(['class' => 'uk-checkbox']) ?>

            <?= Html::submitButton('Забронировать', ['class' => 'uk-button uk-button-primary']) ?>
        </div>
    </div>

<?php ActiveForm::end() ?>