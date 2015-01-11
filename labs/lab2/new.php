


- 

<style type="text/css">
.fail {
  background-color: red;
  
}
.pass {
  background-color:green;
}
td {
	height:50px;
	width: 50px;
	text-align:middle;
	border:none;
}

table {
	border:none;
}

p {
	text-align:center;
}

	
</style>	
 	
 </style>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>new</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
	
  <div>

    
    <?=
		displayTable(10, 10);
    
    ?> 

    
    </tr>
  </div>
</body>
</html>

 <?php
    
    function displayList($begin, $end, $inc)
	{
		$times = 0;
		// Comments FTW
		for($i = $begin; $i <= $end; $i +=$inc)
		{
		echo "<li>". $i . "</li>";
		echo "<br>";
		$times++;
		}
		
		echo 'Times ran: '. $times;
		echo "<br><br>";
	}
	
	function displayTable($row, $col)
	{
		echo "<table border = 1; align = 'center';>";
		$odd = 0;
		$even = 0;
		for($i = 1; $i <= $row; $i++)
		{
			echo "<tr>";
			for($j = 1; $j <= $col; $j++) {
				$random = rand(1, 100);
				if ($random % 2 == 0) {
				echo "<td class = 'pass'></td>";
				$even++;
				}
				else {
				echo "<td class = 'fail'></td>";
				$odd++;
				}
			}
			echo "</tr>";
		}
		echo "</table>";
		
		echo "<p>Odd: $odd or $odd%</p>";
		echo "<p> Even: $even or $even%</p> ";
		
	}
	
    

    ?>