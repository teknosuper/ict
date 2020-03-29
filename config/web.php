<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';
$db = require __DIR__ . '/db-local.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'modules' => [
            'gridview' =>  [
                'class' => '\kartik\grid\Module'
                // enter optional module parameters below - only if you need to  
                // use your own export download action or custom translation 
                // message source
                // 'downloadAction' => 'gridview/export/download',
                // 'i18n' => []
            ],
            'gridviewKrajee' =>  [
                'class' => '\kartik\grid\Module',
                // your other grid module settings
            ],
            'actionlog' => [
                'class' => 'cakebake\actionlog\Module',
            ],
            'student' => [
                        'class' => 'app\modules\student\Module',
                    ],
            'notification' => [
                        'class' => 'touqeer\notification\Module',
                    ],
            'dashboard' => [
                'class' => 'app\modules\dashboard\Module',
            ],
            'filemanager' => [
                'class' => 'pendalf89\filemanager\Module',
                // Upload routes
                'routes' => [
                    // Base absolute path to web directory
                    'baseUrl' => '',
                    // Base web directory url
                    'basePath' => '@webroot',
                    // Path for uploaded files in web directory
                    'uploadPath' => 'uploads',
                ],
                // Thumbnails info
                'thumbs' => [
                    'small' => [
                        'name' => 'small',
                        'size' => [100, 100],
                    ],
                    'medium' => [
                        'name' => 'medium',
                        'size' => [300, 200],
                    ],
                    'large' => [
                        'name' => 'large',
                        'size' => [500, 400],
                    ],
                ],
            ],
        ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'dAh4B3GNl6Hxh0yZdF3mUyoku14VlG_S',
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
        'view' => [
            'theme' => [
                'pathMap' => [
                    // '@app/views' => '@instagram/views/instaclassifiedv1'
                    '@app/views' => ''
                ],
            ],

        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => require(__DIR__ . '/url-rules.php'),
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
