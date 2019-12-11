<?php
// Start MySQL Connection
	require('dbconnect.php'); 
?>

<html>
<head>
	<title>Air Quality Index</title>
	<style type="text/css">
        .table_titles, .table_cells_odd, .table_cells_even {
                padding-right: 20px;
                padding-left: 20px;
                color: #000;
        }
        .table_titles {
            color: #FFF;
            background-color: #666;
        }
        .table_cells_odd {
            background-color: #CCC;
        }
        .table_cells_even {
            background-color: #FAFAFA;
        }
        table {
            border: 2px solid #333;
        }
        body { font-family: "Trebuchet MS", Arial; }
    </style>
</head>

    <body>
        <h1>Air Quality Index</h1>
    <table border="0" cellspacing="0" cellpadding="4">
      <tr>
            <td class="table_titles">ID</td>
            <td class="table_titles">Latitude</td>
            <td class="table_titles">Longitude</td>
            <td class="table_titles">AQI in ppm</td>
          </tr>
<?php
	// Retrieve all records and display them
    
    $q = "SELECT * FROM aqi ORDER BY id ASC";
   
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
	    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3821.8929376252577!2d74.4681913143442!3d16.682240127149857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc0e26e0a8944ed%3A0x2abc23be634e333f!2sDKTE%20Society&#39;s%20Textile%20%26%20Engineering%20Institute%20(An%20Autonomous%20Institute)!5e0!3m2!1sen!2sin!4v1576069262190!5m2!1sen!2sin" width="400" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe></p>

    </body>
</html>
