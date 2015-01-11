<?php
 
require '../../connection.php';
 
/**** Getting all team names and their stadium Id ****/
$sql = "SELECT teamName, stadiumId
        FROM nfl_team
        ORDER BY teamName ASC";
 
$stmt = $dbConn -> prepare($sql);
$stmt -> execute();
$teamNames = $stmt->fetchAll();
 
/**** Getting stadiumInfo based on stadium Id ****/
if (isset ($_GET['stadiumId'])) {
   $stadiumId = $_GET['stadiumId'];
   $sql = "SELECT *
           FROM nfl_stadium
           WHERE stadiumId = :stadiumId ";
       
   $stmt = $dbConn -> prepare($sql);
   $stmt -> execute( array (':stadiumId' => $stadiumId));
   $stadiumInfo = $stmt->fetch();
}
 
function largestCombinedCapacity() {
        global $dbConn, $stmt;
        $sql = "SELECT state, SUM( capacity ) combinedCapacity
        FROM nfl_stadium
        GROUP BY state
        ORDER BY combinedCapacity DESC
        LIMIT 5";
       
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        return  $stmt->fetchAll();
 
}

function teamsAndStadiums() {
	global $dbConn, $stmt;
	$sql = "SELECT teamName, stadiumName, state
			FROM nfl_team t
			JOIN nfl_stadium s ON t.stadiumId = s.stadiumId
			ORDER BY teamName";
			
	    $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        return  $stmt->fetchAll();
}
 
 
?>
 
<!DOCTYPE html>
<html lang="en">
	<link rel="stylesheet" type="text/css" href="style.css" />
<head>
  <meta charset="utf-8">
  <title> Yor Name - Lab 5</title>
</head>
 
<body>
  <div>
 
   <h5> NFL Teams & Stadiums Queries </h5>
 
     <form>
         <select name="stadiumId">
           <option value="-1"> - Select Team -</option>
           <?php
                foreach ($teamNames as $team) {
                    echo "<option  value=" . $team['stadiumId'] . ">" . $team['teamName'] . "</option>";
                }        
             
           ?>  
         </select>
         <input type="submit" value="Get Stadium Info!" />
     </form>
 
    <?php
   
        if (isset($stadiumInfo) && !empty($stadiumInfo)) {
            echo $stadiumInfo['stadiumName'] . "<br />";
            echo $stadiumInfo['street'] . "<br />";
            echo $stadiumInfo['city'] . ", " . $stadiumInfo['state'] . " " . $stadiumInfo['zip']  . " <br />";
        }
   
    ?>
   
    <br>
    <h5> Top 5 Stadiums with the largest combined number of seats in NFL stadiums</h5>
    <br/>
    <?php
    
    $records = largestCombinedCapacity();
	
        foreach($records as $record) {
                echo $record['state'] . " - " . $record['combinedCapacity'] . "<br/>";
        }
      ?>

	<br />
	<h5>List of all teams and their home stadiums</h5>
	<br>
 <?php
 
 $records = teamsAndStadiums();
 foreach($records as $record) {
 	echo $record['teamName']. " - ". $record["stadiumName"] . " - " . $record['state'] ."<br/>";
 	 }	
 
 ?>
 
    <?php
   
    $dbConn = null; //closes the database connection.
   
    ?>
  </div>
</body>
</html>