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

if (isset($_POST['update'])) { 
    $changeValue = htmlspecialchars($_POST['update']);
    $changeInfo = true;
} 
if ($changeInfo == true) {
    if (isset($_POST['cruise'])) { 
        $cruise = htmlspecialchars($_POST['cruise']);
    }

    if (isset($_POST['room'])) { 
        $room = htmlspecialchars($_POST['room']);
    }
}


              
$tripUpdateQuery = "UPDATE trip SET cruise_id = $cruise, room_id = $room WHERE trip_id=$changeValue";

$updatestmt = $db->prepare($tripUpdateQuery);
$updatestmt->execute();






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
function changeTrip() {
  //Alert user that trip has been booked
  alert("Your trip has been changed!");
}
</script>
<link rel="stylesheet" href="trip.css">
</head>

<body id="backgroundColors">
<header style="margin-left: 350px; color: white;">
  <h1>CHANGE YOUR CURRENT BOOKINGS</h1>
</header>
<div id="main" style="border-style: ridge;">
<h3>
<form method="POST"> 
        <p>Select Cruise Type:
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
            </select>
        </p>
    <?php

        
        

        $query = "SELECT cruise_type, room_type, total_cost, trip_id FROM trip
        AS t JOIN cruise AS c ON t.cruise_id = c.id
        JOIN room AS r ON t.room_id = r.id";
        foreach ($db->query($query) as $row) {
          print "<p><b>CRUISE: </b>$row[0]<br><br>";

          if ($row[0] == "Salt Lake City Cruise") {
            print "<img src='slccruise.jpg'><br><br>";
          }
          else if ($row[0] == "Antarctic Cruise") {
            print "<img src='antarcticcruise.jpg'><br><br>";
          }
          else if ($row[0] == "Moon Cruise") {
            print "<img src='mooncruise.jpg'><br><br>";
          }
          
          print "<b>ROOM: </b>" .  
          "$row[1]<br> <b>TOTAL COST: $</b>" . "$row[2] </p>
          <p>
          
          <input type='radio' name='update' value='$row[3]'>Update Trip
          
          
            <button type='submit' class='btn btn-default' onclick='changeTrip()'>UPDATE TRIP</button>
            
            <br><br><br>";   
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