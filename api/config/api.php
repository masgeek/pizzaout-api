<?php
\Yii::setAlias('@logsfolder', dirname(__DIR__) . '/../logs');
\Yii::setAlias('@foodimages', 'images/foodimages/');


$db = LOCAL ? require_once(__DIR__ . '/../../config/db_2.php') : require_once(__DIR__ . '/../../config/db.php');
$fcm = require_once(__DIR__ . '/../../config/fcm.php');
$braintree = require_once(__DIR__ . '/../../config/braintree.php');
$params = require_once(__DIR__ . '/../../config/params.php');
$formatter = require_once(__DIR__ . '/../../config/formatter.php');
$session = require_once(__DIR__ . '/../../config/session.php');
$log = require_once(__DIR__ . '/../../config/logger.php');
$config = [
    'id' => 'API',
    'name' => 'PIZZA OUT API',
    // Need to get one level up:
    'basePath' => dirname(__DIR__) . '/..',
    'timeZone' => $timezone,
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '../vendor/bower-asset',
    ],
    'modules' => [
        'v1' => [
            'class' => 'app\api\modules\v1\module',
        ],
        'gridview' => [
            'class' => 'kartik\grid\Module'
        ]
    ],
    /*'assetManager' => [
        'basePath' => '@webroot/assets',
    ],*/
    'components' => [
        'fcm' => $fcm,
        'session' => $session,
        //'braintree' => $braintree,
        'pdf' => [
            'class' => \kartik\mpdf\Pdf::classname(),
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            // refer settings section for all configuration options
        ],
        'response' => [
            'class' => 'yii\web\Response',
            'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data !== null && Yii::$app->request->get('suppress_response_code')) {
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data' => $response->data,
                    ];
                    $response->statusCode = 200;
                }
            },
        ],
        'request' => [
            'cookieValidationKey' => 'Qq0fIK5vB6mseTKoYXX-dVdwHQFYrEXC',
            'parsers' => [
                //'application/json' => 'yii\web\JsonParser',
            ]
        ],
        'log' => $log,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/my-cart' => 'v1/cart',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                        '{user_id}' => '<user_id:\\w+>',
                        '{menu_cat_id}' => '<menu_cat_id:\\w+>',
                        '{item_type_id}' => '<item_type_id:\\w+>',
                    ],
                    'extraPatterns' => [
                        'POST create-order' => 'create-order',
                        'GET {user_id}/items' => 'items',
                        'GET ussd' => 'ussd',
                        'GET,POST {item_type_id}/in-cart/{user_id}' => 'in-cart',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/order',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                        '{user_id}' => '<user_id:\\w+>',
                        '{rider_id}' => '<rider_id:\\w+>',
                    ],
                    'extraPatterns' => [
                        'POST {user_id}/my-orders' => 'my-orders',
                        'POST {user_id}/active-orders' => 'active-orders',
                        'POST {rider_id}/rider-orders' => 'rider-orders',
                    ]
                ],
                /////////////////////////////////////
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/timeline',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                        //'{user_id}' => '<user_id:\\w+>',
                        '{order_id}' => '<order_id:\\w+>',
                    ],
                    'extraPatterns' => [
                        'GET {order_id}/active-orders' => 'active-orders',
                    ]
                ],
                //////////////////////////////////////
                ///  /////////////////////////////////////
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/address' => 'v1/address',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                        '{user_id}' => '<user_id:\\w+>',
                        '{order_id}' => '<order_id:\\w+>',
                    ],
                    'extraPatterns' => [
                        'GET {user_id}/my-address' => 'my-address',
                    ]
                ],
                //////////////////////////////////////
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/location',
                    ],
                ],
                //////////////////////////////////////
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/rider',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                        //'{user_id}' => '<user_id:\\w+>',
                        '{user_id}' => '<user_id:\\w+>',
                    ],
                    'extraPatterns' => [
                        'GET {id}/my-orders' => 'my-orders',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/cust-addr' => 'v1/customeraddress',
                    ],
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                        '{user_id}' => '<user_id:\\w+>',
                    ],
                    'extraPatterns' => [
                        'GET {user_id}/my-address' => 'my-address',
                    ]
                ],
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => [
                        'v1/payment',
                        'v1/user',
                        'v1/menucategory',
                        'v1/menuitem',
                    ],
                    //'GET,HEAD <id:\d+>/booth' => 'booth/all-booths',
                    'tokens' => [
                        '{id}' => '<id:\\w+>',
                        '{user_id}' => '<user_id:\\w+>',
                        '{menu_cat_id}' => '<menu_cat_id:\\w+>',
                    ],
                    'extraPatterns' => [
                        'GET,POST all' => 'all',
                        'GET,POST,PUT,DELETE push' => 'push',
                        'GET {user_id}/token' => 'token',
                        'POST login' => 'login',
                        'POST recover' => 'recover',
                        'POST register' => 'register',
                        'POST add' => 'add',
                        'POST reserve' => 'reserve',
                        'POST confirm' => 'confirm',
                        'POST cancel' => 'cancel',
                        'POST assign-staff' => 'assign-staff',
                        'POST {id}/add-service' => 'add-service',
                        'POST add-service' => 'remove-service',
                        'POST pay' => 'pay',
                        'GET account-type' => 'account-type',
                        'GET {menu_cat_id}/cat-item' => 'cat-item',
                        'GET single-cat' => 'single-cat',

                        'POST generate' => 'generate',
                    ],
                ],
            ],
        ],
        //formatting class
        'formatter' => $formatter,
        'db' => $db,
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => false,
        ],
    ],
    'params' => $params,
];

return $config;