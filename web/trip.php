<?php
  session_start();


?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Trip Planner</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>

</script>
<link rel="stylesheet" href="trip.css">
</head>

<body id="backgroundColors">
<header style="margin-left: 550px; color: white;">
  <h1>TRIP PLANNER</h1>
</header>
<div id="main" style="border-style: ridge;">
  <p style="font-size: 20px;">Click here to see Cruiseline Options<br>
  <button type="button" class="btn btn-default" onclick="window.location.href='cruiselist.php'">CRUISELINES</button>  
  </p>
  
  <p style="font-size: 20px;">Click here to see Room Options<br>
  <button type="button" class="btn btn-default" onclick="window.location.href='roomtypes.php'">CRUISELINES</button>  
  </p>
  
  <p style="font-size: 20px;">Click here to see Pricing Options<br>
  <button type="button" class="btn btn-default" onclick="window.location.href='price.php'">CRUISELINES</button>  
  </p><br><br>

  <p style="font-size: 20px;">Click here to Book a Trip<br>
  <button type="button" class="btn btn-default" onclick="window.location.href='booktrip.php'">BOOK A TRIP</button>  
  </p>
  <p style="font-size: 20px;">Click here to View/Delete your Trip<br>
  <button type="button" class="btn btn-default" onclick="window.location.href='viewtrip.php'">VIEW YOUR TRIP</button>  
  </p>
  <p style="font-size: 20px;">Click here to Change your Trip<br>
  <button type="button" class="btn btn-default" onclick="window.location.href='changetrip.php'">CHANGE YOUR TRIP</button>  
  </p>

</div>
</body>
</html>