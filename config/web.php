<?php
//date_default_timezone_set('Africa/Nairobi');
\Yii::setAlias('@foodimageupload', 'images' . DIRECTORY_SEPARATOR . 'foodimages' . DIRECTORY_SEPARATOR);
\Yii::setAlias('@foodimages', 'images/foodimages/');
\Yii::setAlias('@appimages', 'images/app_images/');
\Yii::setAlias('@logsfolder', 'logs');

$params = require_once(__DIR__ . '/params.php');
$fcm = require_once(__DIR__ . '/fcm.php');
$braintree = require_once(__DIR__ . '/braintree.php');
$aliases = require_once(__DIR__ . '/aliases.php');
$merchant = require_once(__DIR__ . '/card_merchant.php');
$formatter = require_once(__DIR__ . '/formatter.php');
$session = require_once(__DIR__ . '/session.php');
$log = require_once(__DIR__ . '/logger.php');
$mailer = require_once(__DIR__ . '/mailer.php');
$db = LOCAL ? require_once(__DIR__ . '/db_2.php') : require_once(__DIR__ . '/db.php');
//$db2 = require_once(__DIR__ . '/db_2.php');

$config = [
    'id' => 'WEB',
    'language' => 'en', // SOMALI
    'name' => Yii::t('app', 'Pizza Out'),
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
        'session' => $session,
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
            //'class' => 'yii\caching\FileCache',
            //'class' => 'yii\caching\ApcCache',
            'class' => 'yii\caching\DbCache',
            // 'db' => 'mydb',
            'cacheTable' => 'db_cache',
        ],
        'user' => [
            'identityClass' => 'app\model_extended\USERS_MODEL',
            'enableAutoLogin' => false,
            'authTimeout' => YII_ENV_DEV ? 40000 : 300,
            'enableSession' => true,
            'autoRenewCookie' => false,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => $mailer,
        'log' => $log,
        'db' => $db,
        //'db2' => $db2,

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
        'formatter' => $formatter,

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
