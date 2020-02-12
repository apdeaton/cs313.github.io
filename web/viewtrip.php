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
Select Cruise Type:
  
<?php
    $query = "SELECT * FROM trip";
    foreach ($db->query($query) as $row)
    {
     print "<p><b>$row[1] " . "$row[2]:" . "$row[3]</b> </p>\n\n";
    }
?>

  Select Room Type:
  

    <p style="font-size: 20px;">
      <button type="button" class="btn btn-default" onclick="window.location.href='trip.php'">RETURN HOME</button>  
    </p>
    
</div>
</body>
</html>