<!DOCTYPE  html>
<link rel="stylesheet" type="text/css" href="style.css" />
   <link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
</html>

<?php

session_start();
//session_destroy();


if(!isset($_SESSION['cart']))
{
	$_SESSION['cart'] = array();
}
if(isset($_GET['itemId'])) {
	$_SESSION['cart'][] = $_GET['itemId'];
}
	print_r($_SESSION['cart']);

?>