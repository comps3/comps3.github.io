<?php
require '../connection.php';
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
  

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Car Collection</title>
  <meta name="description" content="">
  <meta name="author" content="Brian Huynh">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">   
  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  
    <style>
  	  @import url(css/carPicker.css);
  </style>
     <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
 
<body class="no-touch"> 
  
  <div class="wrap">
    
    <!-- Define all of the tiles: -->
    
   <?php 
   
   // Implement AJAX into Car details pop up
   
   	$sql = "SELECT b.carId, YEAR, make, model, 
			ENGINE , mileage, mpg, horsePower, torque, seatingCap, class, satradio, sunroof
			FROM  `car_basicInfo` b
			INNER JOIN car_class c ON b.carId = c.carId
			INNER JOIN car_details d ON b.carId = d.carId
			INNER JOIN car_options o ON b.carId = o.carId";
			
			$stmt = $dbConn->prepare($sql);
			$stmt->execute();
			$record2 = $stmt->fetchAll();
			
			$i = 1;
			
		foreach($record2 as $car)
		{
			echo "<div class= 'box1'>";
				echo "<div class='boxInner'>";
					echo "<img src='img/". $i .".jpg' />";
					echo "<div class='titleBox'>". $car['YEAR']. " " . $car['make']. " " . $car['model']. " " ."</div>";
				echo "</div>";
			echo "</div>";
			
			$i++;
		}
   
   ?>
   
   <div class="box" id="box">
   
   
<script>
  $(function(){
     // See if this is a touch device
     if ('ontouchstart' in window)
     {
        // Set the correct body class
        $('body').removeClass('no-touch').addClass('touch');
       
        // Add the touch toggle to show text
        $('div.boxInner img').click(function(){
           $(this).closest('.boxInner').toggleClass('touchFocus');
        });
     }
  });
  

 
 	
  </script>
  

</body>
</html>
