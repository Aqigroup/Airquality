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
            <td class="table_titles">Air quality Index</td>
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
		echo '   <td'.$css_class.'>'.$row["iat"].'</td>';
		echo '   <td'.$css_class.'>'.$row["lgt"].'</td>';
		echo '   <td'.$css_class.'>'.$row["aqi"].'</td>';
		echo '</tr>';
	}
?>
    </table>
<iframe width="100%" height="300px" frameborder="0" allowfullscreen src="https://umap.openstreetmap.fr/en/map/untitled-map_359918?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false"></iframe><p><a href="https://umap.openstreetmap.fr/en/map/untitled-map_359918">See full screen</a></p>
    </body>
</html>