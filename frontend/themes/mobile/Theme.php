<?php

namespace frontend\themes\mobile;

use Yii;

class Theme extends \frontend\themes\Theme
{
    public $info = [
        'author' => 'wsyone|pengpeng',
        'id' => 'mobile',
        'name' => 'jihexian',
        'version' => 'v1.0',
        'description' => '官网手机主题',
        'keywords' => '经典'
    ];

    public function bootstrap()
    {
        Yii::$container->set('yii\bootstrap\BootstrapAsset', [
            'sourcePath' => '@frontend/themes/mobile/static',
            'css' => [
                YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
            ]
        ]);
    }
}