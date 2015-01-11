<!-- The below code is what I have finished for now of the index.php. We need to create the table information on the same page or on another page. for now I am leaving out the $$$ functions until we get this basic information down. since the $$$ part is necesarily needed for the assignemnt. Can be added afterwords. When everyone hopes on feel free to call so i can join (831)737-9218. Jeremy.

Requirements
Done 1) Filter the data retrieved using at least three fields (e.g., filtering movies by category or director)
Done 2) Sort the results using at least one field (asc,desc)
Done 3) Click on a result item to get further information
Done 4) Include two aggregate functions (SUM, AVG, MAX, GROUP BY, etc)
Done 5) Use at least two tables -->


<?php

require '../../connection.php';

$number = 0;

function getPoliticians()
{
	global $dbConn;  
	$sql = "SELECT p.id_number, firstName, lastName, country, 
			party, position, proLifeCost, proOilCost, proGunCost, 
			proPharmCost, proGmoCost, proLife, proOil, proGun, proPharm, proGmo
			FROM t7_politicians p
			JOIN t7_politicianInfo p1 ON p.id_number = p1.id_number
			ORDER BY firstName ASC 
			LIMIT 0 , 30";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt->fetchAll();
}


function getParty()
{
	global $dbConn;  
	$sql = "SELECT p.id_number ,firstName, lastName, country, party, position, 
			proLifeCost, proOilCost, proGunCost, proPharmCost, proGmoCost
			FROM t7_politicians p
			JOIN t7_politicianInfo p1 ON p.id_number = p1.id_number
			ORDER BY party ASC 
			LIMIT 0 , 30";
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt->fetchAll();
}

function getAgenda($id) {
global $dbConn;
$sql = "SELECT agenda_id, agendaInfo
		FROM t7_agenda
		WHERE agenda_id = :id";
	
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute(array(":id" => $id));
	return $stmt->fetch();		

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
		<h2>Welcome to World Politics!</h2>
		<h3>Here is your agenda:</h3>
		
		<?php
		
		$randomAgenda = getAgenda($number);
		echo '<h3>'. $randomAgenda['agendaInfo']. '</h3>';
		
		?>
		
	  	<div>
			
			<?php
			
				$politicians = getPoliticians();
				
				echo "<table border=1 align = center>";
				
				echo "<tr>";
				echo '<td>'. "First Name" . '</td>';
				echo '<td>'. "Last Name" . '</td>';
				echo '<td>'. "Pro Life" . '</td>';
				echo '<td>'. "Pro Oil" . '</td>';
				echo '<td>'. "Pro Gun" . '</td>';
				echo '<td>'. "Pro Pharm" . '</td>';
				echo '<td>'. "Pro GMO" . '</td>';
				echo '<td>'. "Selection" . '</td>';
				echo "</tr>";
			
			?>
			
				<!--
				<td>
				<form action="details.php">
				<input type="hidden" name="politicianId" value="<?= $politician['id_number']?>">
				<input type="submit" value="Info">
				</form>
				</td>
				-->
				
				
			<?php
			
				echo "<form>";
			
				foreach($politicians as $politician)
				{
			?>
						  
				<td><a href="details.php?politicianId=<?= $politician['id_number']?>"><?php echo $politician['firstName']?></a></td> 
				
			<?php 
			
				echo '<td>'. $politician['lastName'] . '</td>'; 
				echo '<td>'. $politician['proLifeCost'] . '</td>';
				echo '<td>'. $politician['proOilCost'] . '</td>';
				echo '<td>'. $politician['proGunCost'] . '</td>';      
				echo '<td>'. $politician['proPharmCost'] . '</td>';
				echo '<td>'. $politician['proGmoCost']. '</td>';    
				echo "<td>";
			?>
				<input type="checkbox" name= "p[]" value="<?= $politician['proLifeCost'] ?>"> 
				 
			
			<?php
			
				echo "</td>";      
				echo '</tr>';
			?>
				
			<?php
			
				}
			  	
				echo "<br>";
				echo "<br>";

				echo "</table>";
				
				echo "<br>";
				echo "<br>";
				echo "<br>";
				
				echo "<input type=submit name=game>";
				echo "</form>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
				echo "<br>";
			
			?>
			
		<form action="party.php">
			<span id="button"><input type="submit" value="Sort by Party"></span>
		</form>
		<form action="position.php">
			<span id="button"><input type="submit" value="Sort by Position"></span>
		</form>
	   	<form action="country.php">
			<span id="button"><input type="submit" value="Sort by Country"></span>
		</form>
	  </div>
  
  <?php
  
  if(isset($_GET['game'])) 
  {
		$total = 0;
		
	if(isset($_GET['p'])) {
		
		foreach($_GET['p'] as $names)
		{
			$total += $names;
		}
		
		echo "<h3>" ."You have spent $". $total ." supporting pro life!". "</h3>"; 
  	}
	
	else if(!isset($_GET['p'])) {
		echo "<h3>" ."You have not selected any politicians to support your cause". "</h3>"; 
	}
	
  	}
  	
  
  ?>
  
  </center> 
</body>
</html>
