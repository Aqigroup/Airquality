<?php

define('DB_USER', '1145488');
define('DB_PASSWORD', 'Suruhosting');
define('DB_HOST', 'localhost');
define('DB_NAME', '1145488db2');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

 // Set the encoding...
 mysqli_set_charset($dbc, 'utf8');
?>