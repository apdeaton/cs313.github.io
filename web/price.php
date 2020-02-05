<?php
  session_start();


*$dbUrl = getenv('DATABASE_URL');

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

foreach ($db->query('SELECT * FROM price') as $row)
{
 print "<p>$row[1]</p>\n\n";
}

foreach ($db->query('SELECT username, password FROM note_user') as $row)
{
  echo 'user: ' . $row['username'];
  echo ' password: ' . $row['password'];
  echo '<br/>';
}

?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Price List</title>
<script>

</script>
<link rel="stylesheet" href="trip.css">
</head>

<body>
<header style="margin-left: 550px; color: rgb(0, 163, 228);">
  <h1>CRUISE PRICING</h1>
</header>
<div id="main" style="border-style: ridge;">
  <div style="width 50px; padding: 20px; color: rbg(0, 163, 228);">
    <h1>
      Test
    </h1>

  </div>
    
</div>

<header style="margin-left: 550px; color: rgb(0, 163, 228);">
  <h1>ROOM PRICING</h1>
</header>
<div id="main" style="border-style: ridge;">
  <div style="width 50px; padding: 20px; color: rbg(0, 163, 228);">
    <h1>
      Test
    </h1>
    <p style="font-size: 20px;">Click here to see Cruiseline Options<br>
      <button type="button" class="btn btn-default" onclick="window.location.href='trip.php'">RETURN HOME</button>  
    </p>
  </div>
    
</div>
</body>
</html>