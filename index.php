<?php
// Start MySQL Connection
	require('dbconnect.php'); 
?>

<html>
<head>
	<title>Air Quality Index</title>
	<style type="text/css">
		* {
    box-sizing: border-box;}
			
       .table_titles, .table_cells_odd, .table_cells_even {
                color: #000;
        }
        .table_titles {
          color: #FFF;
          background-color: #b035e8;
        }
        .table_cells_odd {
            background-color: rgba(170, 0, 247, 0.39);
        }
        .table_cells_even {
            background-color: #FAFAFA;
        }
        table {
            border: 2px solid #333;
			margin-top: 2vh;
			text-align: center;
        }
        body { font-family: -apple-system,BlinkMacSystemFont,"Segoe UI","Roboto","Oxygen","Ubuntu","Cantarell","Fira Sans","Droid Sans","Helvetica Neue",sans-serif; background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);}
    </style>
</head>

    <body>
        <h1 style="text-transform: uppercase;font-size: x-large;text-align: center;letter-spacing: 2px;">Air Quality Index</h1>
	    <div>
		<div >
	    <p><iframe src="https://www.google.com/maps/d/embed?mid=1Ux9GNsi07yRamET1FWRaeZ0S8pyheS8X" width="100%" height="500px"></iframe></p>
        </div>
		
		<div>
    <table border="0" cellspacing="0" cellpadding="4" width="100%">
      <tr>
            <td class="table_titles">ID</td>
            <td class="table_titles">Latitude</td>
            <td class="table_titles">Longitude</td>
            <td class="table_titles">AQI</td>
          </tr>
<?php
	// Retrieve all records and display them
    
    $q = "SELECT `id`, `lat`, `lgt`, `aqi` FROM `Air Quality Index` WHERE 1";
   
    $result = @mysqli_query($dbc, $q); 
    
	
	// Used for row color toggle
	$oddrow = true;
	
	// process every record
	while( $row = mysqli_fetch_array($result) )
	{
		if ($oddrow) 
		{ 
			$css_class=' class="table_cells_odd"'; 
		}
		else
		{ 
			$css_class=' class="table_cells_even"'; 
		}
		
		$oddrow = !$oddrow;
		
		echo '<tr>';
		echo '   <td'.$css_class.'>'.$row["id"].'</td>';
		echo '   <td'.$css_class.'>'.$row["lat"].'</td>';
		echo '   <td'.$css_class.'>'.$row["lgt"].'</td>';
		echo '   <td'.$css_class.'>'.$row["aqi"].'</td>';
		echo '</tr>';
	}
?>
    </table>
</div>
		    
    </body>
</html>
