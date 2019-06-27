<?php

namespace ofilin\sweetalert;

use yii\web\AssetBundle;
use yii\web\YiiAsset;

class SweetAlert2DistAsset extends AssetBundle
{
    public $sourcePath = '@ofilin/sweetalert/src';

    public $css = [
        'css/sweetalert2.min.css',
    ];

    public $js = [
        'js/sweetalert2.all.min.js',
    ];

    public $depends = [
        YiiAsset::class,
    ];
}

