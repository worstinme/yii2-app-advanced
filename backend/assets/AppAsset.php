<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $sourcePath = '@frontend/assets/source';

    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/css/uikit.min.css',
        'https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&amp;subset=cyrillic',
        'css/style.css',
    ];
    public $js = [
        'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/js/uikit.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.39/js/uikit-icons.min.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
