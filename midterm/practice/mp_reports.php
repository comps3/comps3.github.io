<?php
	require '../../dbConn.php';
	
	$sql = "SELECT town_name, population 
			FROM mp_town
			WHERE population > 50000 AND population < 80000";
			
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$towns = $stmt->fetchAll();

	$sql = "SELECT town_name, county_name, population
			FROM mp_town t
			JOIN mp_county c ON t.county_id = c.county_id
			ORDER BY population DESC 
			LIMIT 0 , 30";
			
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$towns1 = $stmt->fetchAll();

$sql = "SELECT town_name, population
		FROM mp_town
		ORDER BY population ASC 
		LIMIT 0 , 30";
		
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$towns2 = $stmt->fetchAll();

$sql = "SELECT town_name, county_name
		FROM mp_town t
		RIGHT JOIN mp_county c ON t.county_id = c.county_id
		LIMIT 0 , 30";
		
		
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$towns3 = $stmt->fetchAll();

$sql = "SELECT county_name, population
			FROM mp_town t
			JOIN mp_county c ON t.county_id = c.county_id
			ORDER BY county_name ASC 
			LIMIT 0 , 30";
			
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$towns4 = $stmt->fetchAll();

$sql = "SELECT town_name ,county_name, state_name, population
FROM mp_town t
JOIN mp_county c ON c.county_id = t.county_id
JOIN mp_state s ON s.state_id = c.state_id
LIMIT 0 , 30";

$stmt = $dbConn->prepare($sql);
$stmt->execute();
$towns5 = $stmt->fetchAll();
		
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>mp_reports</title>
  <meta name="description" content="">
  <meta name="author" content="Brian Huynh">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
	<?php
	foreach($towns as $town) {
		echo $town['town_name']. "  " .$town['population'];
		echo "<br>";
	}
	
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	foreach($towns1 as $town) {
		echo $town['town_name']. " " . $town['county_name'] . " " .$town['population'];
		echo "<br>";
	}
	
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	$county1 = null;
	$i = 0;
	
	foreach($towns4 as $town) {
		if ($i == 0) {
		$county1 = $town['county_name'];
		$i++;
		}
		else {
			break;
		}	
	}
	
	$pop_total = 0;
	
	foreach($towns4 as $town) {
		
		if($town['county_name'] == $county1)
		{
			$pop_total += $town['population'];
		}
		else {
			echo $county1 . " " . $pop_total;
			echo "<br>";
			$pop_total = $town['population'];
			$county1 = $town['county_name'];
			
		}
		
	}
	
	echo $county1 . " " . $pop_total;
	
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	$i = 0;
	
	foreach($towns2 as $town)
	{
		if($i < 3) {
		echo $town['town_name']. " ". $town['population'];
		echo "<br>";
		$i++;
		}
	}
	
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	foreach($towns3 as $town)
	{
		if($town['town_name'] == NULL) {
			echo $town['county_name'];
			echo "<br>";
		}
	}

	$state_name = null;
	
	$i = 0;
	
	foreach($towns5 as $town) {
		if ($i == 0) {
		$state_name = $town['state_name'];
		$i++;
		}
		else {
			break;
		}	
	}
	
	$pop_total = 0;
	
	echo "<br>";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	foreach($towns5 as $town) {
		if($town['state_name'] == $state_name)
		{
			$pop_total += $town['population'];
		}
		else {
			echo $state_name . " " . $pop_total;
			$pop_total = $town['population'];
			$state_name = $town['state_name'];
		}
			
	}
	
	echo "<br>";
	echo $state_name . " " . $pop_total;
	
	
	
	?>
  </div>
  
  <br />
  <br />
      
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The report shows all cities/towns that have a population between 50,000 and 80,000</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>The report shows all towns along with their county name ordered by population (from biggest to smallest)</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>The report lists the total population per county</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
       <td>4</td>
       <td>The report lists the total population per state</td>
       <td align="center">15</td>
     </tr>
     <tr style="background-color:#99E999">
      <td>5</td>
      <td>The report lists the three least populated towns</td>
      <td width="20" align="center">10</td>
    </tr>     
    <tr style="background-color:#99E999">
      <td>6</td>
      <td>List the counties that do not have a town in the "town" table</td>
      <td width="20" align="center">10</td>
    </tr>
     <tr style="background-color:#99E999">
      <td>7</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>    

  
</body>
</html>
