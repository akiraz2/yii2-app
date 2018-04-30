<?php
$hostinfo = require 'params.php';
return [
    'language' => 'en-US',
    'sourceLanguage' => 'en-US',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '-',
            'defaultTimeZone' => 'Europe/Moscow',
            'locale' => 'ru-RU',
            'thousandSeparator' => ' ',
            'decimalSeparator' => '.',
            // must enable php intl extension for \NumberFormatter
            /*'numberFormatterOptions' => [
                \NumberFormatter::MIN_FRACTION_DIGITS => 0,
                \NumberFormatter::MAX_FRACTION_DIGITS => 0,
            ]*/
        ],
        'cache' => [
            'class' => yii\caching\DbCache::class,
            'cacheTable' => '{{%cache}}',
            /*'class' => \yii\redis\Cache::class,
            'redis' => [
                'hostname' => 'localhost',
                'port' => 6379,
                'database' => 0,
            ]*/
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'urlManagerFrontend' => [
            'class' => \yii\web\UrlManager::class,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'hostInfo' => $hostinfo['frontendHost'],
            'rules' => require __DIR__.'/../../frontend/config/urls.php',
        ],
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
            ],
        ],
        'queue' => [
            'class' => \yii\queue\db\Queue::class,
            'db' => 'db', // DB connection component or its config
            'tableName' => '{{%queue}}', // Table name
            'channel' => 'default', // Queue channel key
            'mutex' => \yii\mutex\MysqlMutex::class, // Mutex used to sync queries
            'as log' => \yii\queue\LogBehavior::class,
            'as quuemanager' => \ignatenkovnikita\queuemanager\behaviors\QueueManagerBehavior::class
            // Other driver options
        ],
    ],
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => false,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['adminus'],
            'modelMap' => [
                'User' => 'common\models\User',
            ],
        ],
    ],
];
