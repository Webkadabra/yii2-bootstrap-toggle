<?php
/**
 * @author sergii gamaiunov <hello@webkadabra.co>
 */

namespace webkadabra\yii\widgets\bootstrap\toggle;


use yii\web\AssetBundle;

class BootstrapToggleAsset extends AssetBundle
{
    public $sourcePath = '@bower/bootstrap-toggle';

    public $css = [
        'css/bootstrap2-toggle.min.css',
    ];

    public $js = [
        'js/bootstrap2-toggle.min.js',
    ];

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\web\JqueryAsset',
    ];
}