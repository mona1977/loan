<?php
/*
   DEVELOPER: SURENDRA GUPTA
   Date : 10-FEB-2020

 * Application configuration for unit tests
 */
return yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../../config/web.php'),
    require(__DIR__ . '/config.php'),
    [

    ]
);
