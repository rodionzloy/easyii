<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\easyii\assets\FrontendAsset;
use yii\easyii\models\Setting;

$asset = FrontendAsset::register($this);
$position = Setting::get('toolbar_position') === 'bottom' ? 'bottom' : 'top';
?>
