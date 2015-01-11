<?php

require '../../connection.php';
 
$sql = "SELECT teamName 
        FROM nfl_team
        WHERE 1";

$namedParameter = array(); // Array to prvent SQL Injection

if(isset($_GET['conference']))
{
	$conference = $_GET['conference'];
}

if (!empty($conference)) {
    
    $sql = $sql . " AND conference = :conf"; // Using named parameter to avoid SQL Injection
    $namedParameter[":conf"] = $conference;
}

if(isset($_GET['division']))
{
	$division = $_GET['division'];
	$sql .= " AND division = :div";
	$namedParameter[":div"] = $division;
}
         
    $sql .= " ORDER BY teamName";

$stmt = $dbConn->prepare($sql);
$stmt->execute($namedParameter);
$records = $stmt->fetchAll();

$sql = "SELECT stadiumName, t1.teamName team1, team1_score, t2.teamName team2, team2_score
		FROM nfl_match m
		JOIN nfl_stadium s1 ON s1.stadiumId = m.stadiumId
		JOIN nfl_team t1 ON t1.teamId = m.team1_id
		JOIN nfl_team t2 ON t2.teamId = m.team2_id
		LIMIT 0 , 30";
		
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$gameList = $stmt->fetchAll();

$sql = "SELECT t.teamName, s.stadiumName, s.capacity
		FROM nfl_stadium s
		JOIN nfl_team t ON t.stadiumId = s.stadiumId
		ORDER BY s.capacity DESC 
		LIMIT 0 , 30";

$stmt = $dbConn->prepare($sql);
$stmt->execute();
$homeStadiums = $stmt->fetchAll();
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css" />
  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Review: NFL Team Report</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
	<h3>NFL Team Report</h3>
	Select Conference: 
	
	<form>
	
	<select name="conference">
		<option value="">All</option>
		<option value="A">American</option>
		<option value="N">National</option>
	</select>
	
	<br /><br /><br />
	Select Division; <br>
	
	<input type="radio" name="division" value="E">East
	<input type="radio" name="division" value="W" > West
	<input type="radio" name="division" value="N">North
	<input type="radio" name="division" value="S"> South
	<br />
	<input type="submit" value="Get Teams!">
	
	</form>
	<?php
	
	echo "<br><br><br>";
	
		if(isset($records)) {
			foreach($records as $record)
			{
				echo $record['teamName']. "<br>";
			}
			
		}
		
	echo "<br><br><br>";
	echo "<h3>NFL Scoreboard</h3>";
	
	foreach($gameList as $game)
	{
		echo  $game['team1']. " (" . $game['team1_score']. ") ".
		$game['team2']. " (". $game['team2_score']. ") @ " . $game['stadiumName'];
		echo "<br><br>"; 
	}
	
	echo "<br><br><br>";
	
	echo "<h3>Home Stadiums of 32 NFL Teams</h3>";
	
	foreach($homeStadiums as $homeStadium)
	{
		echo $homeStadium['teamName'] . " - ". $homeStadium['stadiumName'] . " (" . $homeStadium['capacity']. ") ";
		echo "<br><br>"; 
	}

	?>
	
  </div>
</body>
</html>
