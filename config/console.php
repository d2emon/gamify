<?php

Yii::setAlias('@tests', dirname(__DIR__) . '/tests/codeception');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'aliases' => [
	'@uploads'    => 'web/uploads',
        '@advices'    => 'web/images/advices',
        '@workspaces' => 'web/images/workspaces',
        '@jobs'       => 'web/images/jobs',
    ],
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'modules' => [
        'advice' => [
	    'class' => 'd2emon\advice\Module',
	],
	'image' => [
	    'class' => 'uxappetite\yii2image\Module',
	    'groups' => [
		'advice' => [
		    'path' => '@advices/',
		    'default' => 'default',
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
		],
		'job' => [
		    'path' => '@jobs/',
		    'suffixes' => [
		        '_s' => 64,
		    ],
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
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
