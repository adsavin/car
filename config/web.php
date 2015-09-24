<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'lo',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'JYvwpNrcSejMNhmvxUXMfypzhZRVTone',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
//            'identityClass' => 'dektrium\user\models\User',
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
        'db' => require(__DIR__ . '/db.php'),
        'authManager' => [
            // 'class' =>  'yii\rbac\PhpManager',
            'class' => 'yii\rbac\DbManager',
        ],
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceMessageTable' => '{{%source_message}}',
                    'messageTable' => '{{%message}}',
                    'enableCaching' => true,
                    'cachingDuration' => 3600,
                    'forceTranslation' => true,
                    'on missingTranslation' => ['app\components\TranslationEventHandler', 'handleMissingTranslation']
                ]
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
    ],
    'params' => $params,
    'modules' => [
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',
            'controllerMap' => [
                'assignment' => [
//                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'class' => 'app\controllers\AdminAssignmentController',
//                    'userClassName' => 'dektrium\user\models\User',
                    'userClassName' => 'app\models\User',
                ],
                'role' => [
                    'class' => 'app\controllers\AdminRoleController',
                ]
            ],
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'modelMap' => [
                'User' => 'app\models\User',
            ],
            'controllerMap' => [
                'admin' => 'app\controllers\UserAdminController',
                'registration' => 'app\controllers\UserRegistrationController',
                'security' => 'app\controllers\UserSecurityController',
                'recovery' => 'app\controllers\UserRecoveryController',
                'settings' => 'app\controllers\UserSettingsController',
                'profile' => 'app\controllers\UserProfileController',
            ],
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin'] //superadmin
//            /user/registration/register	Displays registration form
//            /user/registration/resend	Displays resend form
//            /user/registration/confirm	Confirms a user (requires id and token query params)
//            /user/security/login	Displays login form
//            /user/security/logout	Logs the user out (available only via POST method)
//            /user/recovery/request	Displays recovery request form
//            /user/recovery/reset	Displays password reset form (requires id and token query params)
//            /user/settings/profile	Displays profile settings form
//            /user/settings/account	Displays account settings form (email, username, password)
//            /user/settings/networks	Displays social network accounts settings page
//            /user/profile/show	Displays user's profile (requires id query param)
//            /user/admin/index	Displays user management interface
        ],
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'gii/*',
//            'admin/*',
            'debug/*',
            'user/registration/*',
            'user/security/*',
        ]
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;