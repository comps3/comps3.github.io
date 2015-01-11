<?php

require '../connection.php';

session_start();

if(isset($_POST['honk']))
{
	$sql = "SELECT reservationNum, firstName, lastName 
			FROM car_reservation 
			WHERE reservationNum = :reservationNum 
			AND firstName = :firstName
			AND lastName = :lastName";
			
			
		$stmt = $dbConn->prepare($sql);
		$stmt->execute(array(":reservationNum" => $_POST['reservation'],
							":firstName" => $_POST['firstname'], ":lastName" => $_POST['lastname']));
		$record = $stmt->fetch();
		
		 if(empty($record)) {
			echo "Invalid Reservation Information";
		}
		else {
			$_SESSION['reservationNum'] = $record['reservationNum'];
			$_SESSION['firstName'] = $record['firstName'];
			header("Location: carPicker.php");
		}			
}

 


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Rental Car Pick</title>
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
 
  	<form method="post">
  		<input type="text" name="reservation" id="reservationNum" />
		<input type="text" name="firstname"  id="first" />
		<input type="text" name="lastname" id="last" />
		<input type="submit" name="honk" value="Find my car" id="button" />
	</form>
	
	<form action="guest.php">
		<input type="submit" value="Car Collection" id="button2" />
	</form>
	
	<form action="login.php">
		<input type="submit" value="Admin Login" id="button3" />
	</form>
	
	<br />
	<br />
	<br />
	
	First Field: 1234 <br />
	Second Field: Brian <br />
	Third Field: Huynh <br /> 

  </div>
</body>
</html>
