<?php


require '../../connection.php';

	function getStadium() {
		global $dbConn;
		$sql = "SELECT stadiumName, stadiumId
				FROM nfl_stadium
				ORDER BY stadiumName ASC";
				
		$stmt = $dbConn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();		
	}
	
	function getTeamNames() {
		global $dbConn;
		$sql = "SELECT teamId, teamName
				FROM nfl_team
				ORDER BY teamName ASC";
				
		$stmt = $dbConn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();		
		
	}
	
	function getStadiums() {
		global $dbConn;
		$sql = "SELECT stadiumId, stadiumName
				FROM nfl_stadium
				ORDER BY stadiumName ASC";
		
		$stmt = $dbConn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();	
		
	}
	
	if(isset($_POST['delete'])) { // Checks whether the delete button was clicked
		
		$sql = "DELETE FROM nfl_stadium
				WHERE stadiumId = :stadiumId";
		
		$stmt = $dbConn->prepare($sql);
		$stmt->execute(array(":stadiumId" => $_POST['stadiumId']));
		
		echo "STADIUM HAS BEEN DELETED!";
			
	}

	if(isset($_POST['addMatch'])) {
		
		$sql = "INSERT INTO nfl_match
				(team1_id, team2_id, date, time, stadiumId, team1_score, team2_score)
				VALUES(:team1_id, :team2_id, :date, :time, :stadiumId, :team1_score, :team2_score )";
				
		$stmt = $dbConn->prepare($sql);
		$stmt->execute(array(":team1_id" => $_POST['team1'], 
								":team2_id" => $_POST['team2'], 
								":date" => $_POST['date'],
								":time" => $_POST['time'],
								":stadiumId" => $_POST['stadium'],
								":team1_score" => $_POST['team1_score'],
								":team2_score" => $_POST['team2_score']));
		
		$matchId = $dbConn->lastInsertId(); // Used to get the match ID
		$sql = "INSERT INTO nfl_recap
				(matchId, recap)
				VALUES(:matchId, :recap)";
				
		$stmt = $dbConn->prepare($sql);
		$stmt->execute(array(":matchId" => $matchId, ":recap" => $_POST['recap']));
		
		echo "Record was successfully submitted";
								
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Lab 6: Brian Huynh</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link href='http://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'>
  
  <script>
  	
  	function confirmDelete(stadiumName)
  	{		
  		
  		var remove = confirm("Do you really want to delete " + stadiumName);
  		
  		if(!remove)
  		{
  			event.preventDefault();		
  		}
  	
  		
  	}
  	
  </script>
  
  <style>
  	form {
  		display: inline;
  	}
  </style>
  
</head>

<body>
  <div>

  	
  	<h3>NFL Matches</h3>

  	
  	Select Team 1: 
  	<form method="post">
  		
  		<select name="team1">
  			<?=
  			$teamNames = getTeamNames();
			
			foreach($teamNames as $team)
			{
				echo "<option value=". $team['teamId']. ">" . $team['teamName'] . "</option>";
			}
  			
  			 ?>
  		</select>
  		<br/>
  		Team 1 Score: <input type="number" name="team1_score">
  	
  		
  		
  		<br />
  		Select Team 2:
  		<select name="team2">
  			<?php
			
			foreach($teamNames as $team)
			{
				echo "<option value=". $team['teamId']. ">" . $team['teamName'] . "</option>";
			}
  			
  			?>
  			
  		</select>
 		<br/>
 		Team 2 Score: <input type="number" name="team2_score">
 		<br />
 		Date: <input type="date" name="date">
  		<br />
  		Time: <input type="time" name="time">
  		<br />
  		Stadium: 
  		<select name="stadium">
  			<?php
  			
  			$stadiumNames = getStadiums();
  			foreach($stadiumNames as $stadium)
			{
				echo "<option value=". $stadium['stadiumId']. ">" . $stadium['stadiumName'] . "</option>";
			}
			
  			?>
  			
  		</select>
  		<br />
  		<textarea name="recap" rows="15" cols="60" placeholder="Enter Map Recap"></textarea>
  		<br/>
  		 <input type="submit" name="addMatch">
  		
  	</form>
  	
 	<h3> NFL Stadiums </h3>
 	
 	<?php
 	
 	$stadiumList = getStadium();
	
	foreach($stadiumList as $stadium) { ?>
		
		<?echo $stadium['stadiumName'] ;?>
		
		<form action="updateStadium.php">
			<input type="hidden" name="stadiumId" value="<?echo $stadium['stadiumId'];?>" />
			<input type="submit" name="update" value="Update">
		</form>
		<form method="post" onsubmit="confirmDelete('<?= $stadium['stadiumName'];?>')"> <!-- Connect to JS -->
			<input type="hidden" name="stadiumId" value="<?echo $stadium['stadiumId'];?>" />
			<input type="submit" name="delete" value="Delete">
		</form>
		<br />
		<br />
		
		
		
	<?
	}
 	
 	?>
 	
  </div>
</body>
</html>
