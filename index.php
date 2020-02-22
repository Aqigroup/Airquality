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
	
	.PG {
    --gn: auto;
    --gg: 2vh;
    --gc: 1;
    --gr: 1;
    --go: 0;
    display: grid;
    gap: var(--gg,0)
}

@media (min-width:640px) {
    .PG {
        grid-template-columns: repeat(var(--gn,1),1fr)
    }

    .PG>* {
        grid-column: auto/span var(--gc,auto);
        grid-row: auto/span var(--gr,auto);
        order: var(--go,0);
        min-width: 0
    }
 }
			
       .table_titles, .table_cells_odd, .table_cells_even {
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
			margin-top: 2vh;
			text-align: center;
        }
        body { font-family: -apple-system,BlinkMacSystemFont,"Segoe UI","Roboto","Oxygen","Ubuntu","Cantarell","Fira Sans","Droid Sans","Helvetica Neue",sans-serif; }
    </style>
</head>

    <body>
        <h1 style="text-transform: uppercase;font-size: x-large;text-align: center;letter-spacing: 2px;">Air Quality Index</h1>
	    <div class="PG" style="--gn: 5;">
		<div style="--gc: 3;">
	    <p><iframe src="https://www.google.com/maps/d/embed?mid=1Ux9GNsi07yRamET1FWRaeZ0S8pyheS8X" width="100%" height="500px"></iframe></p>
        </div>
		
		<div style="--gc: 2;">
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
