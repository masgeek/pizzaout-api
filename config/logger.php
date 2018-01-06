<?php
return [
    'traceLevel' => YII_DEBUG ? 3 : 0,
    'targets' => [
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['error', 'warning'],
            'logFile' => '@logsfolder/api.log',
        ],
        [
            'class' => 'yii\log\FileTarget',
            'levels' => ['info'],
            //'logFile' => 'logs/trace.log',
        ],
    ],
];