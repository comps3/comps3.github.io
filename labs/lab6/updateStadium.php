<?php


require '../../connection.php';

function getStadiumInfo($stadiumId) {
	global $dbConn;
	
	$sql = "SELECT *
			FROM nfl_stadium
			WHERE stadiumId = :stadiumId";
			
			$stmt = $dbConn->prepare($sql);
			$stmt->execute(array(":stadiumId" => $stadiumId));
			return $stmt->fetch();		
}

	if(isset($_POST['save'])) {
		
		$sql = "UPDATE nfl_stadium
				SET stadiumName = :stadiumName,
				city = :city,
				street = :street,
				state = :state
				WHERE stadiumId = :stadiumId";
			
			$stmt = $dbConn->prepare($sql);
			$stmt->execute(array(":stadiumName" => $_POST['stadiumName'], ":city" => $_POST['city'], ":street" => $_POST['street'], ":state" => $_POST['state'], ":stadiumId" => $_POST['stadiumId']));
			
			echo "INFORMATION HAS BEEN UPDATED";	
		
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>updateStadium</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
	<h3>Updating Stadium Info</h3>
	
	<?php
	
	$stadiumInfo = getStadiumInfo($_GET['stadiumId']);
	//echo $stadiumInfo['stadiumId'];
	 
	 /*
	echo $stadiumInfo['stadiumName']. " ";
	echo $stadiumInfo['street']. " ";
	echo $stadiumInfo['city']. " ";
	echo $stadiumInfo['state']. " ";
	echo $stadiumInfo['zip']. " ";
	*/
	
	
	?>
	
	<form method="post">
		Name: <input type="text" name="stadiumName" value="<?= $stadiumInfo['stadiumName']; ?>" /> <br />
		Street: <input type="text" name="street" value="<?= $stadiumInfo['street']; ?>" /> <br />
		City: <input type="text" name="city" value="<?= $stadiumInfo['city']; ?>" /> <br /> 
		State: <input type="text" name="state" value="<?= $stadiumInfo['state']; ?>" /> <br />
		Phone: <input type="text" name="phone" value="<?= $stadiumInfo['phone']; ?>" /> <br />
		Capacity: <input type="text" name="capacity" value="<?= $stadiumInfo['capacity']; ?>" /> <br />
		<input type="hidden" name="stadiumId" value="<?= $stadiumInfo['stadiumId']; ?>"/>
		<input type="submit" name = "save" value="Save!" /> 
	</form>
	

	
	<br /> <br />
	<a href="index.php"> Back to the list </a>
	
  </div>
</body>
</html>
