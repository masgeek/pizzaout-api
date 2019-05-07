<?php
//date_default_timezone_set('Africa/Nairobi');
\Yii::setAlias('@foodimageupload', 'images' . DIRECTORY_SEPARATOR . 'foodimages' . DIRECTORY_SEPARATOR);
\Yii::setAlias('@foodimages', 'images/foodimages/');
\Yii::setAlias('@appimages', 'images/app_images/');
\Yii::setAlias('@logsfolder', 'logs');


$params = require_once(__DIR__ . '/params.php');
$fcm = require_once(__DIR__ . '/fcm.php');
$brain_tree = require_once(__DIR__ . '/braintree.php');
$aliases = require_once(__DIR__ . '/aliases.php');
$merchant = require_once(__DIR__ . '/card_merchant.php');
$formatter = require_once(__DIR__ . '/formatter.php');
$session = require_once(__DIR__ . '/session.php');
$log = require_once(__DIR__ . '/logger.php');
$mailer = require_once(__DIR__ . '/mailer.php');
$db =require_once(__DIR__ . '/db.php');
//$db = require_once(__DIR__ . '/db_2.php');

$config = [
    'id' => 'WEB',
    'language' => 'en', // SOMALI or ENGLISH
    'name' => Yii::t('app', 'Pizza Out'),
    'basePath' => dirname(__DIR__),
    'timeZone' => $timezone,
    'bootstrap' => [
        'log'
    ],
    'aliases' => $aliases,
    'modules' => [
        'gridview' => [
            'class' => 'kartik\grid\Module'
        ],
        'customer' => [
            'class' => 'app\modules\customer\Module',
        ],
        'reports' => [
            'class' => 'app\modules\reports\Module',
        ],
        'wpcart' => [
            'class' => 'app\modules\wpcart\cart',
        ],
    ],
    'components' => [
        /* CSRF VALIDATION */
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'IAyw-vu_u-ruH_LfDNEFS-LEQR88cAdM',
            'enableCsrfValidation' => true,
            //'class'=>'HttpRequest',
            'class' => 'app\components\Request',
            'noCsrfRoutes' => [
                'controller/action1',
                'controller/action2',
            ],
        ],
        /* SMS Components */
        'sms' => [
            'class' => 'app\components\SmsComponent',
            'from' => 'Pizza Out',
            'apiKey' => 'xz2b2Fo32fFIBiBz5LhtTzusde9tZc3z',
            'apiToken' => 'B6tU1522871594',
            'defaultPrefix' => '252',
            'baseUrl' => 'http://yooltech.com/sadar/portal',
            'endpoint' => '/smsAPI'
        ],

        /* custom view template */
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
        'cache' => [
            //'class' => 'yii\caching\FileCache',
            //'class' => 'yii\caching\ApcCache',
            'class' => 'yii\caching\DbCache',
            // 'db' => 'mydb',
            'cacheTable' => 'db_cache',
        ],
        'user' => [
            'identityClass' => 'app\model_extended\USERS_MODEL',
            'enableAutoLogin' => true,
            'authTimeout' => 900, //logout after 15 minutes 15*60
            'enableSession' => true,
            'autoRenewCookie' => true,
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
    //$config['bootstrap'][] = 'debug';
    //$config['modules']['debug'] = [
    //'class' => 'yii\debug\Module',
    // uncomment the following to add your IP if you are not connecting from localhost.
    // 'allowedIPs' => ['127.0.0.1', '::1', '41.89.65.170', '192.168.100.14'],
    //];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
