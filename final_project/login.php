<?php

require '../connection.php';

session_start();

if(isset($_POST['carWrangler'])) {
	
$sql = "SELECT username, password, firstname, lastname
		FROM car_admin
		WHERE username = :username
		AND password = :password";
		
	$stmt = $dbConn->prepare($sql);
	$stmt->execute(array(":username" => $_POST['username'], ":password" => sha1($_POST['password'])));
	$login = $stmt->fetch();
	
	if(empty($login))
	{
		echo "Incorrect username AND/OR password";
	}
	else {
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['user'] = $login['firstname']. " " . $login['lastname'];
		header("Location: admin.php");
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

  <title>Admins Only!</title>
  <meta name="description" content="">
  <meta name="author" content="Brian Huynh">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
	<h2>Rental Car Management System</h2>
	
	<form method="post">
		<input type="text" placeholder="Username" name="username" /><br /><br />
		<input type="password" placeholder="Password" name="password" /><br /><br />
		<input type="submit" value="Login" name = "carWrangler"/>
	</form>
	
	<br/>
	<br />
	
	Username: bhuynh<br />
	Password: pass<br />
	<br/>
	<br />
	
	Username: sjohnson<br />
	Password: pass<br />
	
  </div>
</body>
</html>
