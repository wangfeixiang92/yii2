<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'wfx',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
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
        'db' => $db,
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
/*
 * 本章将介绍如何使用 Gii 去自动生成 Web 站点常用功能的代码。使用 Gii 生成代码非常简单，
 *  只要按照 Gii 页面上的介绍输入正确的信息即可。贯穿本章节，你将会学到：
 * 在你的应用中开启 Gii
 * 使用 Gii 去生成活动记录类
 * 使用 Gii 去生成数据表操作的增查改删（CRUD）代码
 * 自定义 Gii 生成的代码
 * 开始 Gii
 * Gii 是 Yii 中的一个模块。 可以通过配置应用的 modules 属性开启它。
 * 通常来讲在 config/web.php 文件中会有以下配置代码：
 *
 *
 * 这段配置表明，如果当前是开发环境， 应用会包含 gii 模块，模块类是 yii\gii\Module。
 * 如果你检查应用的入口脚本 web/index.php， 将看到这行代码将 YII_ENV_DEV 设为 true：
 * defined('YII_ENV') or define('YII_ENV', 'dev');
 * 鉴于这行代码的定义，应用处于开发模式下，按照上面的配置会打开 Gii 模块。
 * 你可以直接通过 URL 访问 Gii：
 *  如果你通过本机以外的机器访问 Gii，请求会被出于安全原因拒绝。
 *  你可以配置 Gii 为其添加允许访问的 IP 地址：
 * */
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1','192.168.*.*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1','192.168.*.*'],
    ];
}
return $config;
