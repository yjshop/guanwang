<?php

namespace frontend\themes\guanwang;

use Yii;

class Theme extends \frontend\themes\Theme
{
    public $info = [
        'author' => 'wsyone|pengpeng',
        'id' => 'guanwang',
        'name' => 'jihexian',
        'version' => 'v1.0',
        'description' => 'jihexian主题',
        'keywords' => '经典'
    ];

    public function bootstrap()
    {
        Yii::$container->set('yii\bootstrap\BootstrapAsset', [
            'sourcePath' => '@frontend/themes/guanwang/static',
            'css' => [
                YII_ENV_DEV ? 'css/bootstrap.css' : 'css/bootstrap.min.css',
            ]
        ]);
    }
}