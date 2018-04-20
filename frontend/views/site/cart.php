<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-cart">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= \worstinme\cart\widgets\Cart::widget(['senderEmail' => Yii::$app->params['senderEmail'], 'adminEmail' => Yii::$app->params['adminEmail']]) ?>

</div>
