<?php
/**
 * @link https://github.com/worstinme/yii2-zoo
 * @copyright Copyright (c) 2017 Eugene Zakirov
 * @license https://github.com/worstinme/yii2-zoo/LICENSE
 */

namespace common\widgets;

use worstinme\zoo\elements\BaseElement;
use worstinme\zoo\elements\system\Element;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

class ActiveField extends \yii\widgets\ActiveField
{
    public $options = ['class' => 'uk-margin'];

    public $labelOptions = ['class' => 'uk-form-label'];

    public $wrapperOptions = ['class' => 'uk-form-controls'];

    public $hintOptions = ['class' => 'uk-form-controls-text hint'];

    public $template = "{label}\n{beginWrapper}\n{hint}\n{input}\n{error}{endWrapper}\n{hidden}";

    public $inputOptions = [];

    public function render($content = null)
    {
        if ($content === null) {
            if (!isset($this->parts['{beginWrapper}'])) {
                $options = $this->wrapperOptions;
                $tag = ArrayHelper::remove($options, 'tag', 'div');
                $this->parts['{beginWrapper}'] = Html::beginTag($tag, $options);
                $this->parts['{endWrapper}'] = Html::endTag($tag);
            }
            if (!isset($this->parts['{hidden}'])) {
                $this->parts['{hidden}'] = '';
            }
        }

        return parent::render($content);
    }
}