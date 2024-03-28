<?php
return [
    'id' => env('APP_NAME', 'micro-app'),
    'basePath' => __DIR__,
    'controllerNamespace' => 'app\controllers',
    'aliases' => [
        '@app' => __DIR__ . '/app',
    ],
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<action:\w+>' => 'oxr/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class'   => 'yii\log\FileTarget',
                    'logFile' => '@runtime/logs/errors.log',
                    'levels'  => ['error', 'warning'],
                ],
                [
                    'class'   => 'yii\log\FileTarget',
                    'logFile' => '@runtime/logs/debug.log',
                    'levels'  => ['info'],
                ],
            ],
        ],
        'request' => [
            'parsers' => [
                'application/json' => 'yii\web\JsonParser'
            ],
        ],
        'response' => [
            'format' => \yii\web\Response::FORMAT_JSON
        ],
    ],
    'params' => [
        'openexchangeratesAppId' => env('OPENEXCHANGERATES_APP_ID'),
    ],
];
