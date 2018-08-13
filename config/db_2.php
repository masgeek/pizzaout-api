<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;port=3306;dbname=pizzaout_db', // MySQL, MariaDB
    //'dsn' => 'sqlite:/path/to/database/file', // SQLite
    //'dsn' => 'pgsql:host=localhost;port=5432;dbname=mydatabase', // PostgreSQL
    //'dsn' => 'cubrid:dbname=demodb;host=localhost;port=33000', // CUBRID
    //'dsn' => 'sqlsrv:Server=localhost;Database=mydatabase', // MS SQL Server, sqlsrv driver
    //'dsn' => 'dblib:host=localhost;dbname=mydatabase', // MS SQL Server, dblib driver
    //'dsn' => 'mssql:host=localhost;dbname=mydatabase', // MS SQL Server, mssql driver
    //'dsn' => 'oci:dbname=//localhost:1521/mydatabase', // Oracle
    'tablePrefix' => 'tb_',
    'username' => 'root',
    'password' => null,
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    // Duration of schema cache.
    'schemaCacheDuration' => 3600,
    // Name of the cache component used to store schema information
    'schemaCache' => 'db_cache',
    'on afterOpen' => function ($event) {
        // $event->sender refers to the DB connection
        //$event->sender->createCommand("SET time_zone = '+00:00'")->execute();
    }
];