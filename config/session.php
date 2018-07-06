<?php
/**
 * Created by PhpStorm.
 * User: masgeek
 * Date: 14-Dec-17
 * Time: 12:21
 */

return [
    'class' => 'yii\web\DbSession',
    // Set the following if you want to use DB component other than
    // default 'db'.
    // 'db' => 'mydb',
    // To override default session table, set the following
    'sessionTable' => 'my_session',
    'cookieParams' => [
        'httponly' => true,
        'lifetime' => YII_ENV_DEV ? 40000 : 300,
    ],
    'timeout' => YII_ENV_DEV ? 40000 : 300, //session expire
    'useCookies' => true,
    'writeCallback' => function ($session) {
        return [
            'user_id' => Yii::$app->user->id != null ? Yii::$app->user->id : 0,
            'user_name' => Yii::$app->user->identity != null ? Yii::$app->user->identity->username : Yii::$app->request->getUserIP()
        ];
    },
];