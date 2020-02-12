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

function bookTrip() {
  echo "Hello world!";
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
function bookTrip() {
  alert("test");
}
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
        $query = "SELECT * FROM trip";
        foreach ($db->query($query) as $row)
        {
        print "<p><b>CRUISE: </b>$row[1]<br> <b>ROOM: </b>" .  
        "$row[2]<br> <b>TOTAL COST: $</b>" . "$row[3] </p>
        <p>
        <select name 'cruise' id='cruise' style='width: 250px; height: 25px; 
        font-size: 15px; color: black'>
  
        <option value='update'>Update</option>
        <option value='delete'>Change</option>
      </select><br><br>
        </p>
        <button type='submit' class='btn btn-default' onclick='bookTrip()'>UPDATE TRIP</button>
        <br><br>";
          
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