<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => env('FRONTEND_COOKIE_VALIDATION_KEY')
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            
            'rules' => [
                '/' => 'site/index',
                'index/product' => 'site/product',
               'detail/<id:\d+>' => 'article/detail',
               'cate/<cate:\w+>' => 'article/index',
               'cates/cate-<category_id:\d+>' => 'cases/index',
                'cates/view-<id:\d+>' => 'cases/view',
                'book/id-<id:\d+>'=>'book/default/view',
                'book/chapter-<id:\d+>'=>'book/default/chapter',
               'tag/<name:\w+>' => 'article/tag',
               'page/slug/<slug:\w+>'=>'page/slug',
              '<controller:\w+>' => '<controller>/index',
            ],
             'suffix' => '.html',
        ]
    ],
];
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
     	$config['bootstrap'][] = 'debug';
     $config['modules']['debug'] = [
     'class' => 'yii\debug\Module',
     // uncomment the following to add your IP if you are not connecting from localhost.
     'allowedIPs' => ['127.0.0.1', '::1'],
     ];
    
   
}
return $config;
