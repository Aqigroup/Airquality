<?php

require('dbconnect.php');
 // Make the query:
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
$id  = $_GET['ID'];
$station = $_GET['STATION'];
$co = $_GET['CO'];
$pm2_5 = $_GET['PM2_5'];
$o3 = $_GET['O3'];
$nh3 = $_GET['NH3'];
$humidity = $_GET['HUMIDITY'];
$temp = $_GET['TEMP']; 
$aqi = $_GET['AQI']; 

$q = "INSERT INTO `AQI` (`ID`, `STATION`, `CO`, `PM2_5`, `O3`, `NH3`, `HUMIDITY`, `TEMP`, `AQI`) VALUES ('$id', '$station', '$co', '$pm2_5', '$o3', '$nh3', '$humidity', '$temp', '$aqi')";

$r = @mysqli_query($dbc, $q); // Run the query.


if ($r) { // If it ran OK.

 // Print a message:
 echo '<p>Thank you</p>';
$to = "gadadeyogesh007@gmail.com";
$subject = "Air Quality Index";
$message = "<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>Yogeshwar</td>
<td>Gadade</td>
</tr>
</table>
</body>
</html>";
$header = 'From: <gadadeyogesh007@gmail.com>' . "\r\n";
$header .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
if(mail($to,$subject,$message,$header)){
echo "Email send successfully";
   }
   else{
   echo "Email Failed";
    }


 } else { // If it did not run OK.

// Public message:
 echo '<h1>System Error</h1>';
}
mysqli_close($dbc);

}
?>

