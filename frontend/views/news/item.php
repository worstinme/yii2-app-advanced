<?php

\worstinme\zoo\widgets\MetaTags::widget(['model' => $model]);

?>

<h1><?=$model->name?></h1>

<p><?=Yii::$app->formatter->asDate($model->created_at)?></p>

<?=$model->element_description?>