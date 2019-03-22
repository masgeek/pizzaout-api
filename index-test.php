<?php

// NOTE: Make sure this file is not accessible when deployed to production
if (!in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1','41.90.132.219'])) {
    die('You are not allowed to access this file.');
}

//defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('LOCAL') or define('LOCAL', false);
//defined('YII_ENV') or define('YII_ENV', 'test');

require(__DIR__ . '/vendor_new/autoload.php');
require(__DIR__ . '/vendor_new/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/config/web.php');

(new yii\web\Application($config))->run();
