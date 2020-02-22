<?php

define('DB_USER', 'aqigroup');
define('DB_PASSWORD', 'aqi4@heroku');
define('DB_HOST', 'www.db4free.net');
define('DB_NAME', 'aqigroup');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

 // Set the encoding...
 mysqli_set_charset($dbc, 'utf8');
?>
