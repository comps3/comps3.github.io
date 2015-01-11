<?php

require '../../connection.php';

function getPolitician($id){
	global $dbConn;  
	$sql = "SELECT p.id_number ,firstName, lastName, country, party, position, 
			proLifeCost, proOilCost, proGunCost, proPharmCost, proGmoCost
			FROM t7_politicians p
			JOIN t7_politicianInfo p1 ON p.id_number = p1.id_number
			WHERE p.id_number = :id_number
			LIMIT 0 , 30";
			
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute(array(":id_number" => $id));
	return $stmt->fetch();
}

function getMaxCosts()
{
	global $dbConn;  
	$sql = "SELECT 
				MAX(proLifeCost) as maxLife,
				MAX(proOilCost) as maxOil,
				MAX(proGunCost) as maxGun,
				MAX(proPharmCost) as maxPharm,
				MAX(proGmoCost) as maxGmo
			FROM t7_politicianInfo
			LIMIT 0 , 30";
			
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt->fetch();
}

function getAverageCosts()
{
	global $dbConn;  
	$sql = "SELECT 
				AVG(proLifeCost) as aLife,
				AVG(proOilCost) as aOil,
				AVG(proGunCost) as aGun,
				AVG(proPharmCost) as aPharm,
				AVG(proGmoCost) as aGmo
			FROM t7_politicianInfo
			WHERE 1";
			
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
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

  <title>Team 7: Details</title>
  <meta name="description" content="">
  <meta name="author" content="Brian Huynh">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  
<style>
@import url(css/style.css);
</style>
  
</head>

<body>
  <div>
  	<center>
  		<h1>Politician Data For:
		<?php
		
		$politicianId = getPolitician($_GET['politicianId']);
		$maxes = getMaxCosts();
		$averages = getAverageCosts();
		
		echo $politicianId['firstName']. " " . $politicianId['lastName'];
		echo "</h3>";
		echo "Country: " . $politicianId['country']; 
		echo "<br>";
		echo "Party: " . $politicianId['party'];
		echo "<br>";
		echo "Position: ". $politicianId['position'];
		echo "<br>";
		
		echo "<h3>Vote Costs (For or Against) </h3>";
		
		echo "Pro-Life: $". $politicianId['proLifeCost']." vs the average politician cost on this issue of: $".$averages['aLife']." vs the highest politician cost on this issue of: $".$maxes['maxLife'];
		echo "<br>";
		echo "Pro-Oil: $". $politicianId['proOilCost']." vs the average politician cost on this issue of: $".$averages['aOil']." vs the highest politician cost on this issue of: $".$maxes['maxOil']; 
		echo "<br>";
		echo "Pro-Gun: $". $politicianId['proGunCost']." vs the average politician cost on this issue of: $".$averages['aGun']." vs the highest politician cost on this issue of: $".$maxes['maxGun'];
		echo "<br>";
		echo "Pro-Pharm: $". $politicianId['proPharmCost']." vs the average politician cost on this issue of: $".$averages['aPharm']." vs the highest politician cost on this issue of: $".$maxes['maxPharm'];
		echo "<br>";
		echo "Pro-GMO: $". $politicianId['proGmoCost']." vs the average politician cost on this issue of: $".$averages['aGmo']." vs the highest politician cost on this issue of: $".$maxes['maxGmo'];
		echo "<br>";

		
		?>
		<br/>
		<a href="index.php">Back</a>
	</center>
  </div>
</body>
</html>
