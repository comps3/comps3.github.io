<?php

/*
"Method to connect to database"
 
<?php
$host = 'localhost';
$dbname = 'huyn7870';
$username = 'huyn7870';
$password = 'Huynh102';

try {
	
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
}

catch(Exception $e) {
	echo "<h3>Oops, the database is down</h3>";
	exit;
}

$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
 */
 
 /*
  
  "Process used to set and fetch results from the database"
  
$stmt = $dbConn->prepare($sql);
$stmt->execute();
$r1 = $stmt->fetchAll();
 
  */
  
 /*
  * "Code for an in page refresh button"
  *  <form style="padding-left: 570px;"><input type="button" onclick="history.go(0)" value="Deal Again!" /></form>
  */
  
  /*
   * "Generate a random lower case letter"
   * 	echo chr(rand(97,122));
   * 
   * "Generate upper case letter"
   * 	echo chr(rand(65,90))
   * 
   * */
  
  /*
   * "PHP Array Functions"
   * 
   * "Shuffle array elements"
   * 
   * shuffle($array_name);
   * 
   * "Adding elements to array at variable declaration"
   * 
   * $weekdays = array("M","T","W","R","F");  
   * 
   * "Add multiple elements"
   * 
   * array_push($weekdays,"W","R","F");
   * 
   * "For loop syntax"
   * 
   * for ($i = 0; $i < count($array_name); $i++) {
     echo $array_name[$i];
}
   * 
   * "Explode function breaks a string into an array"
   * 
   * $weekdays = "M, T, W, R, F";   // Commas are separating the items
$weekdaysArray =  explode(",", $weekdays); 
print_r($weekdaysArray);  // It will display 5 elements
   * 
   * 
   * "Implode function joins all array elements into a string, seperated by a comma"
   * 
   * $weekdaysArray = array("M","T", "W", "R", "F");   // creates new array
$weekdays =  implode("-*-", $ weekdaysArray); 
print($ weekdays);  // It will display M-*-T-*-W-*-R-*-F
   * 
   * 
   * "List of PHP Array functions"
   * 
   * count($arrayName)  - Returns number of elements in array.

is_array($arrayName) – Returns TRUE if the variable passed is an array.

sort($arrayName) – Orders the elements in the array (from lower to higher).

rsort($arrayName) – Reverses the order of the elements.

array_rand($arrayName) – Selects a random index from the array.

array_values($arrayName) – Re-indexes the array numerically.

array_sum($arrayName) – Calculates the sum of values in an array.

array_unique($arrayName) – Keeps just unique values in an array.
   * 
   * For more array functions: http://www.w3schools.com/php/php_ref_array.asp
 
   
  
/* 
 * "HTML + PHP <3"
 * 
 * "Forms"
 * 
 * Enter your name: <input type="text" name="in"/> 
 * 
 * "List + Checkboxes"
 * 
 * 		"List style"
 * 		<select name="states[]" size="100" multiple>
			<option value="AK">Alaska</option>
			<option value="CA">California</option>
			<option value="UT">Utah</option>
			<option value="NV">Nevada</option>
			<option value="TX">Texas</option>
			<option value="NM">New Mexico</option>
			<option value="NY">New York</option>
		</select>
 * 		
 * 		"Checkboxes"
		<input type="checkbox" name= 'states[]' value="OR"/>Oregon
		<input type="checkbox" name= 'states[]' value="WA"/>Washington
		<input type="checkbox" name= 'states[]' value="ND"/>North Dakota
 * 
 * "Submit button"
 * 
 * <input type="submit" value="Submit">
 * 
 * "PHP"
 * 
 * if(isset($_GET['in'])) {
	$userName = $_GET['in'];
	echo "Hello <br>" . $userName;
}

	if (isset($_GET['in'])) {
		$state_array = $_GET['states'];
	foreach($state_array as $state) {
		echo $state . "<br>";
	}
  }
 * 
 * "Form with Radio Buttons"
 * 
 * Enter Inches: <input type="text" name="in" />
 * 
 * 		"Radio Buttons"
 *       Convert To:
      	<input type="radio" value="cm" name="convert"/> Centimeters
      	<input type="radio" value="yd" name="convert" /> Yards
      	<input type= "radio" value="ft" name="convert" /> Feet
      	<input type="submit" value="Convert" />
 * 
 * "PHP Portion"
 * 
 * if(isset($_GET['in'])) {
		
	$in = $_GET['in'];
	
	if (is_numeric($in)) {
		//echo $cm;
		$centimeters = $in * 2.54;
		$unit = $_GET['convert'];
		switch ($unit) {
			case 'cm':
				$result = $in * 2.54;
				echo " Inches: ". $in . " Centimeters: ". $result;
				break;
			case 'yd':
				$result = $in *3;
				echo " Inches: ". $in . " Yards: ". $result;
				break;
			case 'ft':
				$result = $in * 4;
				echo " Inches: ". $in . " Feet: ". $result;
				break;
			default:
				echo "Not sure bro!";
				break;
			
		}
		
	}
 */
 
 /* "Forms with Drop down + Radio Buttons"
  * 
  * <form>
	<select name="conference">
		<option value="">All</option>
		<option value="A">American</option>
		<option value="N">National</option>
	</select>
	
	<br /><br /><br />
	Select Division; <br>
	
	<input type="radio" name="division" value="E">East
	<input type="radio" name="division" value="W" > West
	<input type="radio" name="division" value="N">North
	<input type="radio" name="division" value="S"> South
	<br />
	<input type="submit" value="Get Teams!">
	
	</form>
  * 
  * "Get the form data"
  * 
  * if(isset($_GET['conference']))
{
	$conference = $_GET['conference'];
}
  * 
  * 
  * if(isset($_GET['division']))
{
	$division = $_GET['division'];
  * 
}
  * 
  * "Check if a variable is empty, zero or false"
  * if(empty($_GET['conference'])) {
  * 	// Do stuff
  * }
  * 
  * 
  * "Check if a variable is number"
  * if(!is_numeric($_GET['conference'])) {
  * 	// Do stuff
  * }
  * 
 */
 
 
 /*
  * "PHP Table Examples"
  * 
  * function displayTable($row, $col)
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
  * 
  * "CSS"
  * 
  * <style type="text/css">
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
 	
  */
  
  
  /*
   * "SQL Syntax <3"
   *
   * "Selecting columns from a table"
   * 
   * SELECT teamName, division, conference
FROM nfl_team
ORDER BY conference
LIMIT 5
   * LIMIT 2,5 // Limit the range of results
   * 
   * WHERE conference = 'A' // Checks the column conference equals to 'A'
   * WHERE conference != 'A' // Checks the column conference equals to 'A'
   * 
   * "Other WHERE operators"
   * <= // less than equal to
   * < // less than
   * >= // greater than equal to
   * > // greater than
   * 
   * "String comparisons using LIKE"
   * WHERE teamName LIKE 'A%' // Checks the first character of a string 
   * 
   * "Select mutiple columns with unique columns"
   * 
   * SELECT teamName, stadiumName
FROM nfl_team t, nfl_stadium s
WHERE t.stadiumId = s.stadiumId  
   *  
   * "Inner Join two tables"
   * SELECT town_name, county_name
FROM mp_town t
INNER JOIN mp_county c ON t.county_id = c.county_id
LIMIT 0 , 30
   * 
   * "Right Join on two tables"
   * 
   * SELECT town_name, county_name
FROM mp_town t
RIGHT JOIN mp_county c ON c.county_id = t.county_id
LIMIT 0 , 30
   * 
   * "Subqueries"
   * SELECT firstname, lastname FROM master_name
WHERE name_id IN (SELECT name_id FROM email);
   * 
   * "String functions in SQL"
   * 
   * SELECT LENGTH('This is cool!'); // Displays length of string
   * 
   * SELECT CONCAT('My', 'S', 'QL'); // Concatenates two or more strings
   * 
   * SELECT CONCAT(firstname, lastname) FROM master_name; // Concatenates two columns
   * 
   * SELECT CONCAT_WS(' ', firstname, lastname) FROM master_name; // Concatenate with spacers
   * 
   * SELECT RTRIM('stringstring   '); or SELECT LTRIM('  stringstring'); // Removes extra characters on either left or right side
   * 
   * SELECT TRIM(LEADING 'X' FROM 'XXXneedleXXX'); // Trim the first occurances
   * 
   * SELECT TRIM(TRAILING 'X' FROM 'XXXneedleXXX');
   * 
   * SELECT TRIM('X' FROM 'XXXneedleXXX'); // Trims all occurances of the character
   * 
   * SELECT LOCATE('needle', 'haystackneedlehaystack'); // Returns index of string
   * 
   * "Date and Time functions in SQL"
   * SELECT DAYOFWEEK('2012-01-09');
   * 
   * SELECT DAYOFMONTH('2012-01-09');
   * 
   * SELECT DAYOFYEAR('2012-01-09');
   * 
   * SELECT COUNT(id) FROM orders WHERE DAYOFWEEK(date_ordered) < 4;
SELECT COUNT(id) FROM orders WHERE DAYOFWEEK(date_ordered) > 3;
   * 
   * SELECT COUNT(id) FROM orders WHERE DAYOFMONTH(date_ordered) < 16;
SELECT COUNT(id) FROM orders WHERE DAYOFMONTH(date_ordered) > 15;
   * 
   * SELECT DAYNAME(date_ordered) FROM orders;
   * 
   * SELECT DAYNAME(date_ordered) FROM orders ORDER BY DAYOFWEEK(date_ordered);
   * 
   * SELECT DISTINCT MONTHNAME(date_ordered) FROM orders;
   * 
   * SELECT DISTINCT YEAR(date_ordered) FROM orders;
   * 
   * SELECT DAYNAME('2001-12-30');
   */

/*
 * "Sum in SQL"
 * 
 * $sql = "SELECT county_name, SUM( population ) population 
FROM mp_town t
JOIN mp_county c ON c.county_id = t.county_id
GROUP BY c.county_id
LIMIT 0 , 30";
 * 
 * 
 */

   




  


   
 


?>