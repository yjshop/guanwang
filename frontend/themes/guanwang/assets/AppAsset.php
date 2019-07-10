<?php

namespace frontend\themes\guanwang\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $sourcePath = '@frontend/themes/guanwang/static';
    public $css = [
        'style/amazeui.min.css',
        'style/icon/iconfont.css',
    
        'style/style.min.css',
        'style/swiper.min.css',
        'style/phone.min.css',

    ];
    public $js = [
        'js/amazeui.min.js',
        'js/modernizr.min.js',
        'js/amazeui.ie8polyfill.min.js',
       
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
        'common\assets\FontAwesomeAsset',
        //'common\assets\ModalAsset',
    ];
}
