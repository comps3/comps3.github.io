<?php

require "../../dbConn.php";

$sql = "SELECT town_name, population
FROM mp_town
WHERE population BETWEEN 50000 and 80000";

$stmt = $dbConn->prepare($sql);
$stmt->execute();
$r1 = $stmt->fetchAll();

$sql = "SELECT town_name, county_name, population
FROM mp_town t
JOIN mp_county c ON c.county_id = t.county_id
ORDER BY population DESC 
LIMIT 0 , 30";

$stmt = $dbConn->prepare($sql);
$stmt->execute();
$r2 = $stmt->fetchAll();

$sql = "SELECT county_name, SUM( population ) population
FROM mp_town t
JOIN mp_county c ON c.county_id = t.county_id
GROUP BY c.county_id
LIMIT 0 , 30";


$stmt = $dbConn->prepare($sql);
$stmt->execute();
$r3 = $stmt->fetchAll();



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>program2_class</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
	<?php
	
	echo "Report 1: Towns with a population between 50K and 80K";
	echo "<br>";
	echo "<br>";
	
		foreach($r1 as $town) {
			echo $town['town_name'] . " - " . $town['population'];
		}
	
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	echo "Report 2: Towns with their county names";
	echo "<br>";
	echo "<br>";
		
		foreach($r2 as $town) {
			echo $town['town_name'] . " - " . $town['county_name']. " - ". $town['population'];
			echo "<br>";
		}
	
	echo "<br>";
	echo "<br>";
	echo "Test:";
	echo "<br>";
	
	
			foreach($r3 as $town) {
			echo $town['county_name']. " - ". $town['population'];
			echo "<br>";
		}
	
	
	
	?>
  </div>
</body>
</html>
