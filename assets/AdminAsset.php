<?php
namespace yii\easyii\assets;

class AdminAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@easyii/media';
    public $css = [
        'css/imgareaselect-default.css',
        'css/admin.css',
        'css/skin-purple.css'
    ];
    public $js = [
        'js/jquery.imgareaselect.pack.js',
        'js/crop.js',
        'js/admin.js',
        'js/app.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\easyii\assets\SwitcherAsset',
    ];
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
    public $publishOptions = [
        'forceCopy' => false,
    ];
}
