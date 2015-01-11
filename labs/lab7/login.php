<?php

require '../../connection.php';

session_start();

if(isset($_POST['loginForm']))
{
	$sql = "SELECT *
			FROM nfl_admin
			WHERE username = :username
			AND password = :password";
			
		$stmt = $dbConn->prepare($sql);
		$stmt->execute(array(":username" => $_POST['username'], ":password" =>  hash('sha1', $_POST['password'])));
		$record = $stmt->fetch();
		
		 if(empty($record)) {
			echo "Wrong username/password!";
		}
		else {
			$_SESSION['username'] = $record['username'];
			$_SESSION['name'] = $record['firstName']. " ". $record['lastName'];
			header("Location: index.php");
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

  <title> Lab 7: B.Huynh</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <link rel="stylesheet" type="text/css" href="style.css" />
  <link href='http://fonts.googleapis.com/css?family=Dosis:500' rel='stylesheet' type='text/css'>
  
</head>

<body>
  <div>

	<h2>Admin Login</h2>
	
	<form method="post">
		User Name: <input type="text" name="username"  /><br /><br />
		Password: <input type="password" name="password" /> <br /> <br />
		<input type="submit" name="loginForm" value="Login!" />
	</form>


	(username: bhuynh password: secret23)
  </div>
  
  
</body>
</html>
