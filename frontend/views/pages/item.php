<?php

\worstinme\zoo\widgets\MetaTags::widget(['model' => $model]);

?>

<h1><?=$model->name?></h1>

<?=$model->element_intro?>

<?=$model->element_content?>