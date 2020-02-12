<?php
  session_start();


$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
}

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"];
$dbPort = $dbopts["port"];
$dbUser = $dbopts["user"];
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

//print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
 die();
}

////////////////////////////////////////////////////////////////////////

$changeInfo = false;

if (isset($_POST['change'])) { 
  $changeValue = htmlspecialchars($_POST['change']);
  $changeInfo = true;

  if (isset($_POST['cruise'])) {
    $cruise = $_POST['cruise'];
    print $cruise;
  }

  if (isset($_POST['room'])) {
    $room = $_POST['room'];
    print $room;

    changeInfo();
  }

  


} 

function changeInfo() {
  print "HELLO WORLD!";
}


if (isset($_POST['delete'])) { 
  $deleteValue = htmlspecialchars($_POST['delete']);

  $tripDeleteQuery = "DELETE FROM trip WHERE id = $deleteValue";

  $stmt = $db->prepare($tripDeleteQuery);
  $stmt->execute();

} 





?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Cruise List</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>

</script>
<link rel="stylesheet" href="trip.css">
</head>

<body>
<header style="margin-left: 550px; color: rgb(0, 163, 228);">
  <h1>YOUR CURRENT BOOKINGS</h1>
</header>
<div id="main" style="border-style: ridge;">
<h3>
<form method="POST"> 
    <?php

        function changeInfo() {
          print "hello!";
        }


        $query = "SELECT * FROM trip";
        foreach ($db->query($query) as $row) {
          print "<p><b>CRUISE: </b>$row[1]<br> <b>ROOM: </b>" .  
          "$row[2]<br> <b>TOTAL COST: $</b>" . "$row[3] </p>
          <p>
          <input type='hidden' name='id' value='$row[0]'>
          
    
          <input type='radio' name='change' value='$row[0]'>Change Trip Info<br>
          <input type='radio' name='delete' value='$row[0]'>Delete Trip
          <br>
          </p>
          <button type='submit' class='btn btn-default' onclick='bookTrip()'>UPDATE TRIP</button>
          <br><br>";   
          
          if ($changeInfo == true) {
            print "Select Cruise Type:
            <select name ='cruise' id='cruise' style='width: 250px; height: 25px; font-size: 15px; color: black'>
            
              <option value='1'>Salt Lake City Cruise -- $1000</option>
              <option value='2'>Antarctic Cruise -- $2000</option>
              <option value='3'>Moon Cruise -- $3000</option>
            </select><br><br>
          
            Select Room Type:
            <select name='room' id='room' style='width: 250px; height: 25px; font-size: 15px; color: black;'>
           
              <option value='1'>Sleep on Deck -- $10</option>
              <option value='2'>Half Room -- $50</option>
              <option value='3'>Normal-Sized Room -- $100</option>
              <option value='4'>Luxury Suite -- $500</option>
              <option value='5'>Captain Quarters -- $1000</option>
            </select><br><br>
            
            <br><br><br>";
          }
        }

        
    ?>
</form>  
</h3>

    <br><br>
    <p style="font-size: 20px;">
      <button type="button" class="btn btn-default" onclick="window.location.href='trip.php'">RETURN HOME</button>  
    </p>

</div>
</body>
</html>