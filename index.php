<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


if (in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1'])) {
    defined('LOCAL') or define('LOCAL', true);
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_ENV') or define('YII_ENV', 'dev');
}else{
    defined('LOCAL') or define('LOCAL', false);
    defined('YII_DEBUG') or define('YII_DEBUG', false);
}
require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/config/web.php');
(new yii\web\Application($config))->run();
