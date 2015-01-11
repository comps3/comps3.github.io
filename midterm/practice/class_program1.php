<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>class_program1</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
  	<!-- Do not worry about CSS in the mid term -->
    <h1 style="text-align: center">Ace of Hearts</h1>
    <?php
    	$cards = array();
    	$players = array("Joe", "Jessie", "Jim", "Jane");

		
    	for($i = 0; $i < 4; $i++) {
			  	
			  $temp = 0;
			  $temp1 = 0;
			  $temp2 = 0;
			  $temp3 = 0;
			  
			  if($i == 0) {
			  	$temp = rand(2,13);
				$temp1 = rand(14, 26);
				$temp2 = rand(27,39);
				$temp3 = rand(40,52);
			  }
			
			if($i >= 1) {
				$temp = rand(2,13);
				if(in_array($temp, $cards)) {
					$temp = rand(2,13);
				}
				$temp1 = rand(14, 26);
				if(in_array($temp1, $cards)) {
					$temp1 = rand(14,26);
				}
				$temp2 = rand(27,39);
				if(in_array($temp2, $cards)) {
					$temp2 = rand(27, 39);
				}
				$temp3 = rand(40,52);
				if(in_array($temp3, $cards)) {
					$temp3 = rand(40, 52);
				}
				
			}
			
    		$cards[] = $temp;
			$cards[] = $temp1;
			$cards[] = $temp2;
			$cards[] = $temp3;
			

    	}
		
		$cards[0] = 1;
		$count = 0;
		$found  = false;
		shuffle($cards);

    	echo "<table align = center>";
			for($i = 0; $i < 4; $i++) {
					echo "<tr>";
					echo "<td>". $players[$i] . "</td>";
					
				for($j = 0; $j < 4; $j++) {
						
					if($cards[$count] == 1) {
						echo "<td style=background-color:yellow>";
						$found = true; 
					}	
				
					else {
					echo "<td>";
					}
					
					echo "<a href=http://google.com> <img src= img/".$cards[$count].".png></a>";
					echo "</td>";
					$count++;
				}
					if($found == true) {
					$found = false;
					echo "<td>". $players[$i]. " won!" . "</td>";
					}
				
				echo "</tr>";
			}
			echo "</table>";
			echo "<br>";
			echo "<br>";
		
    
    ?>
    
    <form style="padding-left: 570px;"><input type="button" onclick="history.go(0)" value="Deal Again!" /></form>
    
  </div>
</body>
</html>
