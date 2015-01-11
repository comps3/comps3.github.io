<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>registration</title>
  <meta name="description" content="">
  <meta name="author" content="huyn7870">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</head>

<body>
  <div>
	<h2>Registration Form</h2>
	<form action="catalog.php">
		First Name: <input type="text" name="firstname" /> <br /><br />
		Last Name: <input type="text" name="lastname" /> <br /><br />
		Email: <input type="text" name="email" /><br /><br />
		Zip Code: <input type="text" name="zip" id="zip"  /><br /><br />
		City: <span id="city"></span> <br /><br />
		
		State: 
		<select id="state">
			<option value= " ">Select One</option>
			<option value="AZ">Arizona</option>
			<option value="CA">California</option>
			<option value="NV">Nevada</option>
			<option value="NY">New York</option>
			<option value="TX">Texas</option>

		</select>
		<br /><br />
		
		County: <select id="county">
			<option value=" ">Select One</option>
			
		</select>
		<br /><br/>
		
		Username: <input type="text" id="username" name="username" />
		<br />
		<span id="usernameFeed"></span>
		<br/>
		Password: <input type="password" id="pass" name="password" />
		<br /><br />
		Latitude: <span id="lat"></span><br /> <br />
		Longitude: <span id="long"></span> <br /><br />
		<input type="submit" value="Sign up!"/>	</form>

	</div>
	
	<script>
		$("#zip").change(function() {
	
      		$.ajax({
            type: "get",
            url: "http://hosting.otterlabs.org/laramiguel/ajax/zip.php",
            dataType: "json",
            data: { "zip_code": $(this).val() },
            success: function(data,status) {
                 $("#city").html(data['city']);
                 $("#long").html(data['longitude']);
                 $("#lat").html(data['latitude']);
                 //alert(data['city']);
              },
              complete: function(data,status) { //optional, used for debugging purposes
                  alert(status);
              }
              
         });

   });
   
   	$("#state").change(function() {
   		
   		 $.ajax({
            type: "get",
            url: "http://hosting.otterlabs.org/laramiguel/ajax/countyList.php",
            dataType: "json",
            data: { "state": $(this).val() },
            success: function(data,status) {
            	// Clears the list
           		 $("#county").html("<option> Select One </option>");
                 for (var i=0; i< data['counties'].length -1; i++){
                     $("#county").append("<option>" + data["counties"][i].county + "</option>" );
                }

              		
                 //alert(data['city']);
              },
              complete: function(data,status) { //optional, used for debugging purposes
                  //alert(status);
              }
              
         });
   	});
   	
   	$("#username").change(function() {
   		
   		  	$.ajax({
            type: "post",
            url: "usernameLookup.php",
            dataType: "json",
            data: { "username": $(this).val() },
            success: function(data,status) {
            	
                 if(data['exist'] == "true")
                 {
                 	$("#usernameFeed").html("Username already exists!");
                 	$("#username").css("background-color","red");
                 	$("#username").focus();
                 }
                 else {
                 	$("#usernameFeed").html("Username is avaiable!");
                 }
              },
              complete: function(data,status) { //optional, used for debugging purposes
                  //alert(status);
              }
              
         });
   		
   	});
   
   		
		
	</script>
	
</body>
</html>
