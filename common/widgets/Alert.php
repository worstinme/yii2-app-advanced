<?php
namespace common\widgets;

use Yii;
use yii\web\JsExpression;

class Alert extends \yii\bootstrap\Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - key: the name of the session flash variable
     * - value: the bootstrap alert type (i.e. danger, success, info, warning)
     */
    public $alertTypes = [
        'error'   => 'danger',
        'success' => 'success',
        'info'    => 'primary',
        'primary'    => 'primary',
        'warning' => 'warning'
    ];
    /**
     * @var array the options for rendering the close button tag.
     * Array will be passed to [[\yii\bootstrap\Alert::closeButton]].
     */
    public $closeButton = [];

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $session = Yii::$app->session;
        $flashes = $session->getAllFlashes();

        $appendClass = isset($this->options['class']) ? ' ' . $this->options['class'] : '';

        foreach ($flashes as $type => $flash) {

            if (!isset($this->alertTypes[$type])) {
                continue;
            }

            foreach ((array) $flash as $i => $message) {

                $id =  $this->getId() . '-' . $type . '-' . $i;

                $message = new JsExpression($message);

                $typeStatus = $this->alertTypes[$type];

                $script = <<<JS

                UIkit.notification({
                    message: '$message',
                    status: '$typeStatus',
                    pos: 'top-right',
                    timeout: false
                });

JS;

                $this->view->registerJs($script, $this->view::POS_READY);

            }

            $session->removeFlash($type);
        }
    }
}
