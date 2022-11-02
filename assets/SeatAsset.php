<?php

namespace app\assets;

use yii\web\AssetBundle;

class SeatAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [   
        'css/checkin.css',     
    ];
    public $js = [
        'js/seats.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
