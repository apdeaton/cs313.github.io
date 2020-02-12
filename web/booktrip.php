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


try {
    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
    print "<p>error: $ex->getMessage() </p>\n\n";
    die();
}



///////////////////////////////////////////////////////////////////////////

$cruise;

if (isset($_POST['cruise'])) { 
  $cruise = htmlspecialchars($_POST['cruise']);
} 

$room;

if (isset($_POST['room'])) { 
  $room = htmlspecialchars($_POST['room']);
}

$totalCost;
$cruiseCost;
$roomCost;

//Prepared query to get cost of cruise from database
$cruiseCostQuery = 'SELECT cost FROM trip AS t JOIN cruise AS c ON t.cruise_id = c.id
JOIN price AS p ON c.cruise_price = p.id WHERE cruise_id = '. $cruise . '';

//Prepared query to get cose of room from database
$roomCostQuery = 'SELECT cost FROM trip AS t JOIN room AS r ON t.room_id = r.id
JOIN price AS p ON r.room_price = p.id WHERE room_id = ' . $room . '';

print $cruise . "<br><br>";
print $room . "<br><br>";
print $cruiseCostQuery . "<br><br>";
print $roomCostQuery . "<br><br>";
//$cruiseCost = $db->query($cruiseCostQuery);


// Get the cruise cost
$statement = $db->prepare($cruiseCostQuery);
	$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
  $cruiseCost = $row['cost'];
}

print "cruise cost: $cruiseCost\n\n";

//Get the room Cost
$roomstatement = $db->prepare($roomCostQuery);
$roomstatement->execute();

while ($row = $roomstatement->fetch(PDO::FETCH_ASSOC))
{
  $roomCost = $row['cost'];
}

print "room cost: $roomCost\n\n";

$totalCost = $cruiseCost + $roomCost;

print "total cost:  $totalCost";
  


//$tripQuery = "INSERT INTO trip (cruise_id, room_id) VALUES ($cruise, $room)";

$stmt = $db->prepare("INSERT INTO trip (cruise_id, room_id, total_cost) VALUES ($cruise, $room, $cruiseCost + $roomCost)");
//$stmt->bindValue(':cruise', $cruise, PDO::PARAM_INT);
//$stmt->bindValue(':room', $room, PDO::PARAM_INT);
$stmt->execute();


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
function bookTrip() {
  //Alert user that trip has been booked
  alert("CONGRATULATIONS!!! Your trip has sucessfully booked!");
}

</script>
<link rel="stylesheet" href="trip.css">
</head>

<body>
<header style="margin-left: 550px; color: rgb(0, 163, 228);">
  <h1>PLEASE FILL OUT OUR FORM</h1>
</header>
<div id="main" style="border-style: ridge;">
  
  <form method="POST">
  Select Cruise Type:
  <select name ="cruise" id="cruise" style="width: 250px; height: 25px; font-size: 15px; color: black">
  <option value="none">Choose a Cruise</option>
    <option value="1">Salt Lake City Cruise -- $1000</option>
    <option value="2">Antarctic Cruise -- $2000</option>
    <option value="3">Moon Cruise -- $3000</option>
  </select><br><br>

  Select Room Type:
  <select name="room" id="room" style="width: 250px; height: 25px; font-size: 15px; color: black;">
  <option value="none2">Choose a Room</option>
    <option value="1">Sleep on Deck -- $10</option>
    <option value="2">Half Room -- $50</option>
    <option value="3">Normal-Sized Room -- $100</option>
    <option value="4">Luxury Suite -- $500</option>
    <option value="5">Captain Quarters -- $1000</option>
  </select><br><br><br>

    <p style="font-size: 20px;">
      <button type="submit" class="btn btn-default" onclick="bookTrip()">BOOK TRIP</button>  
    </p><br><br> 
    
  </form>

    
    <p style="font-size: 20px;">
    <button type="button" class="btn btn-default" onclick="window.location.href='trip.php'">RETURN HOME</button>  
    </p>


    
</div>
</body>
</html>