<?php

define('DB_USER', 'axAb8zWqMq');
define('DB_PASSWORD', 'VDd3l7XHuC');
define('DB_HOST', 'remotemysql.com');
define('DB_NAME', 'axAb8zWqMq');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

 // Set the encoding...
 mysqli_set_charset($dbc, 'utf8');
?>
