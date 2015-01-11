<?php
require '../connection.php';

session_start();

if(!isset($_SESSION['reservationNum']))
{
	header("Location: index.php");
}

$sql = "SELECT firstName, lastName, class
		FROM car_reservation
		WHERE reservationNum = :reservationNum";
		
		$stmt = $dbConn->prepare($sql);
		$stmt->execute(array(":reservationNum" => $_SESSION['reservationNum']));
		$record = $stmt->fetch();
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
  

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Pick your car</title>
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


  <div>
 	<div class="overlay" id="overlay" style="display: none;"></div>
 	
 	<div class="box" id="box">
 		<a class="boxclose" id="boxclose"></a>
 		<h1>Car Rental Reservation Information</h1>
 		<p>
 		
 		<?php
 		
 		echo "Hello ". $record['firstName']. " ". $record['lastName']. ", " . "<br>";
		echo "You have ordered a ". $record['class']. " in your reservation.". "<br>";
		echo "If you see a car that you like, feel free to upgrade.";
		
 		?>
 		
 		</p>
 	</div>
 	
  </div>

  <script>
  
  	$(function() {
    $(document).ready(function(){
        $('#overlay').fadeIn('fast',function(){
            $('#box').animate({'top':'325px'},500);
        });
    });
    $('#boxclose').click(function(){
        $('#box').animate({'top':'-200px'},500,function(){
            $('#overlay').fadeOut('fast');
        });
    });
 
});


  </script>
 
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
			
			if(empty($record2))
			{
				echo "We have an empty array Brian.";
			}
			
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
   
    <!--
    <div class="box1">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/7.jpg" />
        <div class="titleBox">Butterfly</div>
      </div>
    </div>
    <div class="box1">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/1.jpg" />
        <div class="titleBox">An old greenhouse</div>
      </div>
    </div>
    <div class="box1">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/2.jpg" />
        <div class="titleBox">Purple wildflowers</div>
      </div>
    </div>
    <div class="box1">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/3.jpg" />
        <div class="titleBox">A birdfeeder</div>
      </div>
    </div>
    <div class="box1">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/10.jpg" />
        <div class="titleBox">Crocus close-up</div>
      </div>
    </div>
    <div class="box1">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/4.jpg" />
        <div class="titleBox">The garden shop</div>
      </div>
    </div>
    <div class="box1">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/5.jpg" />
        <div class="titleBox">Spring daffodils</div>
      </div>
    </div>
    <div class="box1">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/6.jpg" />
        <div class="titleBox">Iris along the path</div>
      </div>
    </div>
    <div class="box1">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/8.jpg" />
        <div class="titleBox">The garden blueprint</div>
      </div>
    </div>
    <div class="box1">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/9.jpg" />
        <div class="titleBox">The patio</div>
      </div>
    </div>
    <div class="box1">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/11.jpg" />
        <div class="titleBox">Bumble bee collecting nectar</div>
      </div>
    </div>
    <div class="box1">
      <div class="boxInner">
        <img src="http://www.dwuser.com/education/content/creating-responsive-tiled-layout-with-pure-css/images/demo/12.jpg" />
        <div class="titleBox">Winding garden path</div>
      </div>
    </div>
    
  </div>
-->
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
  
  /*
  $("img").click(function() {
	$("img").css("opacity", "");
	$(this).css("opacity", "0.4");			
  });
  */
 
 	
  </script>
  

</body>
</html>
