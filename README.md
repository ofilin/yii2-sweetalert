<p align="center">
    <img src="./swal2-logo.png" alt="SweetAlert2">
</p>

yii2-sweetalert
============

This asset override standard JavaScript `yii.confirm` method. Plugin [SweetAlert2](https://sweetalert2.github.io/)

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require --prefer-dist ofilin/yii2-sweetalert "*"
```

or add

```
"ofilin/yii2-sweetalert": "*"
```

to the require section of your `composer.json` file and run `composer update`

Configure
-----
In your Asset file add this SweetAlertAsset:
```
public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        \ofilin\sweetalert\SweetAlertAsset::class,
    ];
```
or register in view file:
```
\ofilin\sweetalert\SweetAlertAsset::register($this);
```

Show alerts:
-----
Basic alert
```
<?= \ofilin\sweetalert\SweetAlertWidget::widget(['pluginOptions' => [
    'type' => 'error',
    'title'=>'Oops...',
    'text' => 'Something went wrong!',
]]) ?>
```

Flash alert:
```
// in controller
Yii::$app->session->setFlash('success', "Статья сохранена");

<!-- in view/layout -->
<?= \ofilin\sweetalert\SweetAlertWidget::widget(['isFlash' => true]) ?>

```