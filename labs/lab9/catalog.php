<?php

session_start();

foreach($_SESSION['cart'] as $item)
{
	echo $item. "<br>";	
}

require '../../connection.php';

function get_teams() 
{
	global $dbConn;
	$sql = "SELECT teamName, teamId
			FROM nfl_team";
	
	$stmt = $dbConn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Catalog</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
   <link rel="stylesheet" type="text/css" href="style.css" />
   <link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<body>
  <div>
	<h3>NFL HELMET POSTERS </h3>
	
	<?php
	
	$nfl_teams = get_teams();
	
	echo "<table>";
	
	
	foreach($nfl_teams as $team)
	{
		echo "<tr>";
		echo "<td>". $team['teamName']. "</td>";
		echo "<td><input type='button' name='buy' value='Buy' id='". $team['teamId'] ."' onClick= 'displayTeamId()'></input></td>";
		echo "<td><td>";
		echo "</tr>";
	}
	
	echo "</table>";
	?>
	
	<script>
  	
  		$("input").click(function() {
   		
   		  	$.ajax({
            type: "get",
            url: "cart.php",
            context: this,
            data: { "itemId": $(this).attr("id") },
            success: function(data,status) {
            	$(this).parent().next().html("Item added")
            	$(this).parent().prev().css("background-color", "green")
            },
              complete: function(data,status) { //optional, used for debugging purposes
               
              }
              
         });
   		
   	});
   	
   	<?php
   	
  	foreach($_SESSION['cart'] as $item)
	{
		echo "$('#". $item ."').parent().next().html(\"Item added\");";	
		echo "$('#". $item ."').parent().prev().css(\"background-color\", \"green\");";
	}
	
	?>
  
	</script>
	
  </div>
</body>
</html>
