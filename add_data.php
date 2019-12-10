<?php

require('dbconnect.php');
 // Make the query:
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
$id  = $_GET['id'];
$iat = $_GET['iat'];
$lgt = $_GET['lgt'];
$aqi = $_GET['aqi'];

$q = "INSERT INTO aqi (id, iat, lgt, aqi) VALUES ('$id', '$iat', '$lgt', '$aqi')";

$r = @mysqli_query($dbc, $q); // Run the query.


if ($r) { // If it ran OK.

 // Print a message:
 echo '<p>Thank you</p>';

 } else { // If it did not run OK.

// Public message:
 echo '<h1>System Error</h1>';
}
mysqli_close($dbc);

}
?>