<?php

require '../../connection.php';

session_start();

if(isset($_POST['loginForm']))
{
	$sql = "SELECT *
			FROM t7_admin
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

  <title>login</title>
  <meta name="description" content="">
  <meta name="author" content="Brian Huynh">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
  	
  	<center><h2>Welcome to World Politics Game!</h2></center>
	
	<form method="post">
		User Name: <input type="text" name="username"  /><br /><br />
		Password: <input type="password" name="password" /> <br /> <br />
		<input type="submit" name="loginForm" value="Login!" />
	</form>
	
	<h4>Login credentials</h4>
	
	(username: bhuynh password: secret23)
	<br />
	(username: mlara password: secret22)
	<br />
	(username: ahauser password: secret21)
  	
  </div>
</body>
</html>
