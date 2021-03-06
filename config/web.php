<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'aliases' => [
	'@uploads' => 'uploads',
        '@advices' => 'images/advices',
        '@workspaces' => 'images/workspaces',
        '@jobs' => 'images/jobs',
    ],
    'bootstrap' => [
	'log',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'u76yznbf9ZjIGr20c3REwAYHm8k_l_fb',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'd2emon\user\models\User',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
	'i18n' => [
	    'translations' => [
		'*' => [
	            'class' => 'yii\i18n\PhpMessageSource',
		    // 'basePath' => '@app/messages',
		],
	    ],
	],
    ],
    'modules' => [
        'user' => [
	    'class' => 'd2emon\user\Module',
	],
        'profile' => [
	    'class' => 'app\modules\profile\Module',
	],
        'job' => [
	    'class' => 'app\modules\job\Module',
	],
        'level' => [
	    'class' => 'app\modules\level\Module',
	],
        'stat' => [
	    'class' => 'app\modules\stat\Module',
	],
        'shop' => [
	    'class' => 'app\modules\shop\Module',
	],
        'badge' => [
	    'class' => 'app\modules\badge\Module',
	],
        'advice' => [
	    'class' => 'd2emon\advice\Module',
	],
        'workspace' => [
	    'class' => 'd2emon\workspace\Module',
	],
	'image' => [
	    'class' => 'uxappetite\yii2image\Module',
	    'groups' => [
		'advice' => [
		    'path' => '@advices/',
		    'suffixes' => [
		        '_s' => 64,
		    ],
		],
		'workspace' => [
		    'path' => '@workspaces/',
		    'suffixes' => [
		        '_m' => 150,
		        '_s' =>  64,
		    ],
		    'default' => 'default',
		],
		'job' => [
		    'path' => '@jobs/',
		    'suffixes' => [
		        '_s' => 64,
		    ],
		    'default' => '',
		],
		'project' => [
		    'path' => '@advices/',
		    'suffixes' => [
		        '_s' => 64,
		    ],
		],
		'task' => [
		    'path' => '@advices/',
		    'suffixes' => [
		        '_s' => 64,
		    ],
		],
	    ],
	],
    ],
    'params' => $params,
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
