<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReservSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Резервирование');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reserv-index">

    <h1 class="uk-margin-top"><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions'=> ['class' => 'uk-table uk-form uk-table-small uk-table-condensed uk-table-hover uk-table-striped uk-margin-top'],
        'options'=> ['class' => 'items'],
        'layout' => '{items}{pager}',
        'pager' => ['options'=>['class'=>'uk-pagination']],
        'columns' => [
            'email:email',
            'name',
            'phone',
            'comment:ntext',
            //'state',
            'created_at:datetime',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
