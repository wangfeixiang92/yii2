<?php
/*
 *  这里是数据库的配置信息
 *
 * */
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=192.168.33.10;dbname=yii2basic',
    'username' => 'homestead',
    'password' => 'secret',
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
