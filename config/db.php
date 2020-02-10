<?php
/*
   DEVELOPER: SURENDRA GUPTA
   Date : 10-FEB-2020
   
*/

return [
		'class' => 'yii\db\Connection',
		'dsn' => 'pgsql:host='.getenv('DB_HOST').';port='.getenv('DB_PORT').';dbname=' . getenv('DB_NAME'), // PostgreSQL
		'username' => getenv('DB_USER'),
		'password' => getenv('DB_PASS'),
		'charset' => 'utf8'
];
