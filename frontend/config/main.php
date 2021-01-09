<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
use \yii\web\Request;
$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());
return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
    'authClientCollection' => [
        'class' => 'yii\authclient\Collection',
        'clients' => [
            'google' => [
                'class' => 'yii\authclient\clients\Google',
                'clientId' => '',
                'clientSecret' => '',
            ],
            'facebook' => [
                'class' => 'yii\authclient\clients\Facebook',
                'clientId' => '',
                'clientSecret' => '',
            ],
            'instagram' => [
                'class' => 'kotchuprik\authclient\Instagram',
                'clientId' => '1012867712532188',
                'clientSecret' => 'a2b5c5d8f48dcde5e327ead92d91afc4',
            ],
            'linkedin' => [
                'class' => 'yii\authclient\clients\LinkedIn',
                'clientId' => '746435729281-63l9g8ssptkkqn86dghj47aeeuk1jdq8.apps.googleusercontent.com',
                'clientSecret' => 'khjYMQuwMW0gEfSig_WUlC1_',
            ],
           'twitter' => [
                'class' => 'yii\authclient\clients\Twitter',
                'attributeParams' => [
                    'include_email' => 'true'
                ],
                'consumerKey' => '2YS8MoWaGfdI3TWESHlMZihVT',
                'consumerSecret' => '0LK3zFwAEpGg6xFmFYvh41zQC7qQxCxwkpchhDkxQbnilVA1K4',
            ],
        ],
    ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => $baseUrl,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'baseUrl' => $baseUrl,
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
];
