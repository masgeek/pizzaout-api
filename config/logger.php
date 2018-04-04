<?php
return [
    'traceLevel' => YII_DEBUG ? 3 : 0,
    'targets' => [
        /*[
            'class' => 'yii\log\FileTarget',
            'levels' => ['error', 'warning'],
            'logFile' => '@logsfolder/api.log',
        ],
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['info'],
            'logVars' => ['_FILES'],
            'logFile' => '@logsfolder/trace.log',
            'prefix' => function ($message) {
                return Yii::$app->id;
            }
        ],*/
        'file' => [
            'class' => 'yii\log\FileTarget',
            'categories' => ['yii\web\HttpException:404'],
            'levels' => ['error', 'warning'],
            'logFile' => '@logsfolder/404.log',
        ],
        [
            'class' => 'yii\log\FileTarget',
            'logFile' => '@runtime/logs/http-request.log',
            'categories' => ['yii\httpclient\*'],
        ],
        /*'email' => [
            'class' => 'yii\log\EmailTarget',
            'except' => ['yii\web\HttpException:404'],
            'levels' => ['error', 'warning', 'info'],
            'message' => ['from' => 'developer@pizzaout.so', 'to' => 'barsamms@gmail.com'],
        ],*/
    ],
];