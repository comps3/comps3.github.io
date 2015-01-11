<?php

require '../connection.php';

	$sql = "SELECT b.carId ,YEAR, make, d.model, d.mileage,
			d.mpg, d.engine, d.seatingCap, d.horsePower, d.torque,
			o.satRadio, o.sunroof
			FROM  car_basicInfo b
			INNER JOIN car_details d ON b.carId = d.carId
			INNER JOIN car_options o ON b.carId = o.carId
			WHERE b.carId = :carId";	
	
	$stmt = $dbConn->prepare($sql);
	$stmt->execute(array(":carId" => $_POST['carId']));
	$results = $stmt->fetch();
	
	echo json_encode($results);

?>