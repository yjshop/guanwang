<?php

$config = [
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => env('BACKEND_COOKIE_VALIDATION_KEY')
        ],
        'urlManager' => [
     
            'enablePrettyUrl' => env('backend_enable_pretty_url', true),
            'showScriptName' => false,
        ],
    ],
];

return $config;
