<?php

use yii\helpers\Html;use yii\widgets\ListView;

\worstinme\zoo\widgets\MetaTags::widget(['model'=>$model]);

?>


<h1><?=$model->name?></h1>

<?=$model->intro?>

<?=$model->content?>
