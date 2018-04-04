<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reserv */

$this->title = Yii::t('app', 'Create Reserv');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Reservs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
