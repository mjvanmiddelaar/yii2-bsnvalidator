<?php

// config/test.php
$config =  yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '../../.././../../config/test.php'),
    require(__DIR__ . '/main-local.php'),
    [
        'id' => 'app-tests',
        'components' => [
            'db' => [
                'dsn' => 'mysql:host=localhost;dbname=yii_app_test',
            ]
        ]
    ]
);
return $config;