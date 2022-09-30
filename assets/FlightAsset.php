<?php

namespace app\assets;

use yii\web\AssetBundle;

class FlightAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css',
        'https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css',
        'https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css',
        'https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css',
    ];
    public $js = [
        'https://code.jquery.com/jquery-3.5.1.js',
        'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js',
        'https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js',
        'https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js',
        'https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
        'https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js',
        'https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js',
        'https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js',
        'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
