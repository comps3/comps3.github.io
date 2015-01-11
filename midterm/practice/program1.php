<?php
 		function displayTable($row, $col)
		{
		echo "<table align = 'center';>";
		$storage = array();
		$cards = array();
		$count = 0;
		
		for($i = 1; $i < 53; $i++) {
			$storage[$i-1] = $i;	
		}
		
		for($i = 0;  $i < 16; $i++) {
			$rand_num = rand(2, 13);
			if($storage[$rand_num - 1] == 0) 
			  {
					$i--;	
			  }
			  $cards[] = $rand_num;
			  $storage[$rand_num] = 0;
			  $rand_num = 0;
			  
			  $rand_num = rand(14, 26);
			if($storage[$rand_num - 1] == 0) 
			  {
					$i--;	
			  }
			  $cards[] = $rand_num;
			  $storage[$rand_num] = 0;
			  $rand_num = 0;
			  
			  $rand_num = rand(27, 39);
			if($storage[$rand_num - 1] == 0) 
			  {
					$i--;	
			  }
			  $cards[] = $rand_num;
			  $storage[$rand_num] = 0;
			  $rand_num = 0;
			  
			  $rand_num = rand(40, 52);
			if($storage[$rand_num - 1] == 0) 
			  {
					$i--;	
			  }
			  $cards[] = $rand_num;
			  $storage[$rand_num] = 0;  
			  $rand_num = 0;
		}
		
		$cards[0] = 1;
		
		for($i = 1; $i <= $row; $i++)
		{
			echo "<tr>";
			for($j = 1; $j <= $col; $j++) {
				echo "<td><img src = img/". $cards[$count]. ".png></td>";
				$count++;
			}
			echo "</tr>";
		}
		
 		echo "</table>";
	}
	
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	
 	?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>program1</title>
  <meta name="description" content="">
  <meta name="author" content="Brian Huynh">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
 
 <?php
 
 	displayTable(4, 4);
 ?>
 	
 
  </div>
</body>
</html>
