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
                '<controller:\w+>' => '<controller>/index',
            ]
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
