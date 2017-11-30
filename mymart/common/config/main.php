<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
		'urlManagerBackend' => [
            'class' => 'yii\web\urlManager',
			'baseUrl' => '/mymart/backend/web/',
			'enablePrettyUrl' => true,
			'showScriptName' => false,
		],
    ],
];
