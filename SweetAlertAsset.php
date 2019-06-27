<?php

namespace ofilin\sweetalert;

use yii\web\AssetBundle;

class SweetAlertAsset extends AssetBundle
{
    public $sourcePath = '@ofilin/sweetalert/src';

    public $js = [
        'js/override.yii2.confirm.js',
    ];

    public $depends = [
        SweetAlert2DistAsset::class,
    ];
}
