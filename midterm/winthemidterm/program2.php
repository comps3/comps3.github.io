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

// First solve
$sql = "SELECT firstName, lastName
FROM  m_students 
WHERE gender =  'F'
ORDER BY lastName ASC ";

$stmt = $dbConn->prepare($sql);
$stmt->execute();
$r1 = $stmt->fetchAll();

// Second solve

$sql = "SELECT firstName, lastName, grade
FROM m_students s
INNER JOIN m_gradebook g ON g.studentId = s.studentId
WHERE grade <50
ORDER BY grade ASC 
LIMIT 0 , 30";

$stmt = $dbConn->prepare($sql);
$stmt->execute();
$r2 = $stmt->fetchAll();

$sql = "SELECT firstName, lastName, title, grade
FROM m_students s
INNER JOIN m_gradebook g ON g.studentId = s.studentId
INNER JOIN m_assignments a ON g.assignmentId = a.assignmentId
ORDER BY lastName, title ASC 
LIMIT 0 , 30";

$stmt = $dbConn->prepare($sql);
$stmt->execute();
$r3 = $stmt->fetchAll();

$sql = "SELECT g.studentId student, firstName, lastName, AVG( grade )average
FROM m_students s
INNER JOIN m_gradebook g ON g.studentId = s.studentId
GROUP BY firstName
ORDER BY average DESC 
LIMIT 0 , 30";

$stmt = $dbConn->prepare($sql);
$stmt->execute();
$r4 = $stmt->fetchAll();

$sql = "SELECT title, dueDate
FROM m_gradebook g
RIGHT JOIN m_assignments a ON a.assignmentId = g.assignmentId
WHERE g.assignmentId IS NULL 
ORDER BY dueDate ASC 
LIMIT 0 , 30";

$stmt = $dbConn->prepare($sql);
$stmt->execute();
$r5 = $stmt->fetchAll();



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>program 2</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
</head>

<body>
  <div>
	<?php
	
	echo "Report 1: List of all female students";
	
	echo "<br>";
	echo "<br>";
	
		foreach($r1 as $town) {
			echo $town['firstName'] . " - " . $town['lastName'];
			echo "<br>";
		}
		
	echo "<br>";
	echo "<br>";
		
	echo "Report 2: List of students that have assignments with a grade lower than 50";
	
	echo "<br>";
	echo "<br>";
	
		foreach($r2 as $town) {
			echo $town['firstName'] . " - " . $town['lastName'] . " - ". $town['grade'];
			echo "<br>";
		}
	
	echo "<br>";
	echo "<br>";
	
	echo "Report 3: List of assignments that have not been graded";
	
	echo "<br>";
	echo "<br>";
	
		foreach($r5 as $town) {
			echo $town['title'] . " - " . $town['dueDate'];
			echo "<br>";
		}
		
	echo "<br>";
	echo "<br>";
	
	
	echo "Report 4: Gradebook";
	
	echo "<br>";
	echo "<br>";
	
		foreach($r3 as $town) {
			echo $town['firstName'] . " - " . $town['lastName'] . " - " . $town['title']  . " - ". $town['grade'];
			echo "<br>";
		}
	
	echo "<br>";
	echo "<br>";
	
	echo "Report 5: List of average grade per student (average of the three assignments)";
	
	echo "<br>";
	echo "<br>";
	
		foreach($r4 as $town) {
			echo $town['student']. " - " . $town['firstName'] . " - " . $town['lastName'] . " - " . $town['average'];
			echo "<br>";
		}
	
	?>
	
	<br />
	<br />
	<br />
	
	  
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>A report shows all female students ordered by last name, from A to Z</td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>A report shows students  that have  assignments with a grade lower than 50, ordered by grade, in ascending order</td>
      <td width="20" align="center">15</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>A report lists those assignments that have not been graded and their due date, ordered by due date, ascending</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
       <td>4</td>
       <td>A report shows the Gradebook, which includes first name, last name, assignment title, and grade. It should be ordered by last name and assignment title </td>
       <td align="center">15</td>
     </tr>
     <tr style="background-color:#99E999">
      <td>5</td>
      <td>A report lists each student along with his/her average grade, ordered by average grade, from highest to lowest</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
      <td>6</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b>72</td>
    </tr> 
  </tbody></table>    

<br />
<br />
	
  </div>
</body>
</html>
