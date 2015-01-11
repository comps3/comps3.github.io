<?php

require '../connection.php';

session_start();

if(!isset($_SESSION['username']))
{
	header("Location: login.php");
}

if(isset($_POST['deleteCar']))
{
	//$sql = "DELETE FROM car_basicInfo, car_class, car_details, car_options
	//		WHERE carId = :carId";
	
	$sql = "DELETE t1, t2, t3, t4 FROM
			car_basicInfo as t1
			INNER JOIN car_class as t2 on t1.carId = t2.carId
			INNER JOIN car_details as t3 on t1.carId = t3.carId
			INNER JOIN car_options as t4 on t1.carId = t4.carId
			WHERE t1.carId = :carId";
			
	$stmt = $dbConn->prepare($sql);
	$stmt->execute(array(":carId" => $_POST['carId']));
	
	echo "Car has been sent to the recycling plant!";
}

if(isset($_POST['logout']))
{
	session_destroy();
	header("Location: login.php");
}


function get_cars()
{
	global $dbConn;
	$sql = "SELECT b.carId ,YEAR, make, d.model, d.mileage, c.class
			FROM  car_basicInfo b
			INNER JOIN car_details d ON b.carId = d.carId
			INNER JOIN car_class c ON b.carId = c.carId";	
	
	$stmt = $dbConn->prepare($sql);
	$stmt->execute();
	return $stmt->fetchAll();		
	
}

function getFleetMileage()
{
	global $dbConn;
	$sql = "SELECT SUM(mileage) as totalMileage
			FROM car_details";
	
	$stmt = $dbConn -> prepare($sql);
	$stmt -> execute();
	return $stmt->fetch();
}

function getHighestMileage()
{
	global $dbConn;
	$sql = "SELECT MAX(mileage) as highMileage
			FROM car_basicInfo b
			INNER JOIN car_details d on b.carId = d.carId";
	
	$stmt = $dbConn -> prepare($sql);	
	$stmt -> execute();
	$mileage = $stmt->fetch();
	
		$sql = "SELECT b.carId ,YEAR, make, d.model, d.mileage
			FROM  car_basicInfo b
			INNER JOIN car_details d ON b.carId = d.carId
			WHERE d.mileage = :highmiles";
			
	$stmt = $dbConn -> prepare($sql);	
	$stmt -> execute(array(":highmiles" => $mileage['highMileage']));
	return $stmt->fetch();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Rental Car Administration</title>
  <meta name="description" content="">
  <meta name="author" content="Brian Huynh">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<body>
	

  <div>
  	
  	<br />
  	<br />

  	<form action="newPassword.php">
  		<input type="submit" value="Change Password" />
  	</form> 
  	  
  	 <br />
  	 
 	<form method="post" onclick="confirmLogout()">
  		<input type="submit" value="Logout" name="logout" />
  	</form> 
  	
  	 <br />
  	
  	<form action="newAdministrator.php">
  		<input type="submit" value="Add new administrator"/>
  	</form>
  	
  	<br />
  	<br/>
  	
  	 <script>
  	
  	function confirmLogout()
  	{		
  		var remove = confirm("Do you really want to logout?");	
  		if(!remove)
  		{
  			event.preventDefault();		
  		}
  	}
  	
  	function confirmDelete(carName)
  	{
  		var carRecycle = confirm("Do you really want to remove " + carName + " from the lot?");
  		
  		if(!carRecycle) {
  			event.preventDefault();	
  		}
  	}
  	
  </script>
  
  <?php
  
  	$totalMileage = getFleetMileage();
	$highestMileage = getHighestMileage();
	$cars = get_cars();
  	
	
	echo "The total mileage of the fleet is ". $totalMileage['totalMileage']. " miles". "<br><br>";
	
 	echo "The car with the highest mileage is " . $highestMileage['YEAR']. " ". $highestMileage['make']. " ". $highestMileage['model'] . " (" . $highestMileage['mileage']. ") ";
	
	echo "<br><br>";
  	
  	echo "<table>";
	
	foreach($cars as $car)
	{ 
		
		echo "<tr>"; 
		echo "<td>". $car['YEAR']. " ". $car['make']. " ". $car['model'] . " (" . $car['class'] . ") " . "</td>"; ?>
		
		<form method="post" onsubmit="confirmDelete('<?= $car['YEAR']. " ". $car['make']. " ". $car['model']  ?>')"
		<td><input type='hidden' name='carId' value= "<?= $car['carId'] ?>"></input></td>
		<td><input type='submit' name='deleteCar' value="Delete"></input></td>
		</form>
		<td><input type='button' value='Car Details' id='<?= $car['carId'] ?>' class='carDetails'></input></td>
			
  <?php
		echo "</tr>";
	}
	
	echo "</table>";
  
  ?>
  
  	<script>
		
		$(".carDetails").click(function() {
			
		  $.ajax({
  			type:"post", 
  			url:"fetch_carDetails.php",
  			dataType: "json",
  			data: {"carId": $(this).attr("id") },
  			 success: function(data,status) {
				alert("Car: " + data['YEAR'] + " " + data['make'] + " " + data['model'] + " \n\n" + 
				"Mileage: " + data['mileage'] + "\n" +
				"MPG: "+ data['mpg'] + "\n" +
				"Engine: " + data['engine'] + "\n" +
				"Horsepower: " + data['horsePower'] + "\n" +
				"Torque: " + data['torque'] + "\n" +
				"Seating Capacity: " + data['seatingCap'] + "\n" +
				"Satellite Radio: " + data['satRadio'] + "\n" +
				"Sun Roof: " + data['sunroof'] + "\n");
            },
              complete: function(data,status) { //optional, used for debugging purposes
               
              }
  			
  		});
		
		});
		
	</script>
	
  	
  </div>
  

  
</body>
</html>
