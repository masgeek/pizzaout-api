<?php

$token = 'root';
$user = 'root';
$database = 'food';


return [
    'class' => 'yii\db\Connection',
    'dsn' => "mysql:host=localhost;port=3306;dbname=$database", // MySQL, MariaDB
    'tablePrefix' => 'tb_',
    'username' => $user,
    'password' => $token,
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    // Duration of schema cache.
    'schemaCacheDuration' => 3600,
    // Name of the cache component used to store schema information
    'schemaCache' => 'db_cache',
    'on afterOpen' => function ($event) {
        // $event->sender refers to the DB connection
        //$event->sender->createCommand("SET time_zone = '+03:00'")->execute();
    }
];