<?php

namespace frontend\themes\guanwang\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $sourcePath = '@frontend/themes/guanwang/static';
    public $css = [
        'style/amazeui.min.css',
        'style/iconfont.css',
    
        'style/style.min.css',
        'style/swiper.min.css',
        'style/phone.min.css',   
        'style/authorization.css',
        'style/main.min.css',
        'style/style1.css',
        
    ];
    public $js = [
        'js/amazeui.min.js',
        'js/modernizr.min.js',
        'js/amazeui.ie8polyfill.min.js',
        'js/swiper.min.js',
        'js/app.js'
       
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
        //'yii\bootstrap\BootstrapPluginAsset',
        'common\assets\FontAwesomeAsset',
        //'common\assets\ModalAsset',
    ];
}
