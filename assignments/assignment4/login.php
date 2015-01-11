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
			$_SESSION['adminId'] = $record['adminId'];
			header("Location: index.php");
		
		$sql = "INSERT INTO t7_log
				(adminId, date, time)
				VALUES(:adminId, :date, :time)";
				
				$stmt = $dbConn->prepare($sql);
				$stmt->execute(array(":adminId" => $_SESSION['adminId'], ":date" => date("Y/m/d"), ":time" => date("h:i:s")));
	
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
  <style>@import url(css/style.css); </style>
<link href='http://fonts.googleapis.com/css?family=Dancing+Script' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>

<body>
  <div>
  	
  	<center><h2>Welcome to World Politics Sign In!</h2></center>
	
	<div class="loginForm">
	<form method="post">
		<input type="text" name="username" placeholder="User Name" /><br /><br />
		<input type="password" name="password" placeholder="Password" /> <br /> <br />
		<div class="loginButton"><input type="submit" name="loginForm" value="Login!" /></div>
	</form>
	</div>
	
	<div class="loginInfo">
	<center><h4>Login credentials</h4></center>
	<p>(username: bhuynh password: secret100)</p>

	<p>(username: mlara password: secret22)</p>

	<p>(username: ahauser password: secret21)</p>
	</div>
	
  </div>
</body>
</html>
