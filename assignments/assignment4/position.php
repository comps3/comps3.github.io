
<?php

session_start();

if(!isset($_SESSION['username']))
{
	header("Location: login.php");
	
}

require '../../connection.php';

function getPosition()
{
	global $dbConn;  
	$sql = "SELECT p.id_number ,firstName, lastName, country, party, position, 
			proLifeCost, proOilCost, proGunCost, proPharmCost, proGmoCost
			FROM t7_politicians p
			JOIN t7_politicianInfo p1 ON p.id_number = p1.id_number
			ORDER BY position ASC 
			LIMIT 0 , 30";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
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
<title>Team 7: Politicians</title>
<meta name="description" content="">
<meta name="author" content="guti9034">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">
<style>
@import url(css/style.css);
</style>
</head>

<body>
	<center>

		<h3>Agenda sorted by Politician Position</h3>
	  	<div>
			<?php
				$politicians = getPosition();
				
				echo "<table border=1 align = center>";
				
				echo "<tr>";
				echo '<td>'. "First Name" . '</td>';
				echo '<td>'. "Last Name" . '</td>';
				echo '<td>'. "Position" . '</td>';
				echo '<td>'. "Pro Life" . '</td>';
				echo '<td>'. "Pro Oil" . '</td>';
				echo '<td>'. "Pro Gun" . '</td>';
				echo '<td>'. "Pro Pharm" . '</td>';
				echo '<td>'. "Pro GMO" . '</td>';
				echo "</tr>";
			
			?>
			

				
				
			<?php
			
				echo "<form>";
			
				foreach($politicians as $politician)
				{
			?>
						  
				
				<td><a href="details.php?politicianId=<?= $politician['id_number']?>"><?php echo $politician['firstName']?></a></td> 
				
			<?php 
			
				echo '<td>'. $politician['lastName'] . '</td>'; 
				echo '<td>'. $politician['position'] . '</td>';
				echo '<td>'. $politician['proLifeCost'] . '</td>';
				echo '<td>'. $politician['proOilCost'] . '</td>';
				echo '<td>'. $politician['proGunCost'] . '</td>';      
				echo '<td>'. $politician['proPharmCost'] . '</td>';
				echo '<td>'. $politician['proGmoCost']. '</td>';    
				echo "<td>";
			?> 
				 
			
			<?php
			
				echo "</td>";      
				echo '</tr>';
			?>
				
			<?php
			
				}
				echo "</form>";
				echo "</table>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
			?>
			
		<form action="index.php">
			<span id="button"><input type="submit" value="Go Back"></span>
		</form>
			
	    	 
	  </div>
  
  
  </center> 
</body>
</html>
