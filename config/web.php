<?php

$params = require(__DIR__ . '/params.php');
$fcm = require(__DIR__ . '/fcm.php');
$braintree = require(__DIR__ . '/braintree.php');
$aliases = require(__DIR__ . '/aliases.php');
$merchant = require(__DIR__ . '/card_merchant.php');

$timezone = 'UTC';//'Africa/Nairobi';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'timeZone' => $timezone,
    'bootstrap' => ['log'],
    'aliases' => $aliases,
    'modules' => [
        'gridview' => [
            'class' => 'kartik\grid\Module'
        ],
        'customer' => [
            'class' => 'app\modules\customer\Module',
        ],
    ],
    'components' => [
        /* custom view template*/
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => 'themes/porto_theme'
                ],
            ]
        ],
        'card' => $merchant,
        'fcm' => $fcm,
        //'braintree' => $braintree,
        'pdf' => [
            'class' => \kartik\mpdf\Pdf::classname(),
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            // refer settings section for all configuration options
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'IAyw-vu_u-ruH_LfDNEFS-LEQR88cAdM',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\model_extended\USERS_MODEL',
            'enableAutoLogin' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                //custom rules
                '/' => 'site/index',
                'my-salons' => 'salon/index',
                'my-staff' => 'staff/index',
                'my-payments' => 'payment/index',
                'pending-payments' => 'payment/pending-payments',
                'confirm-payment' => 'payment/confirm-payment',
                'finalized-payments' => 'payment/finalized-payments',
                'my-bookings' => 'reservation/index',
                'add-service' => 'salonservices/create',
                'assign-service' => 'booked/assign-service',
                'confirm-service' => 'booked/confirm-service',
                'confirm-reservation' => 'reservation/confirm-reservation',
                'process-reservation' => 'reservation/process-reservation',
                'confirm' => 'reservation/confirm',
                'services' => 'service/index',

                'active-users' => 'user/active-users',
                'pending-users' => 'user/pending-users',
                'suspended-users' => 'user/suspended-users',
                'deactivated-users' => 'user/deactivated-users',
                'user-status' => 'user/user-status',
            ],
        ],
        //formatting class
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            //'dateFormat' => 'dd.MM.yyyy',
            'decimalSeparator' => '.',
            'thousandSeparator' => ',',
            'timeZone' => $timezone, //default time zones and format
            'currencyCode' => 'USD',
            //'currencyCode' => 'KES',
            'nullDisplay' => '0'
        ],

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '41.89.65.170', '192.168.100.14'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
