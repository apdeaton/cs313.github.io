<?php
  session_start();


/*try
{
    $dbUrl = getenv('DATABASE_URL');

    $dbOpts = parse_url($dbUrl);

    $dbHost = $dbOpts["host"];
    $dbPort = $dbOpts["port"];
    $dbUser = $dbOpts["user"];
    $dbPassword = $dbOpts["pass"];
    $dbName = ltrim($dbOpts["path"] ,'/');

    $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}*/

$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
}

$dbopts = parse_url($dbUrl);

print "<p>$dbUrl</p>\n\n";

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
 print "<p>$row[0]</p>\n\n";
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
<title>Trip Planner</title>
<script>

</script>
<link rel="stylesheet" href="trip.css">
</head>

<body>
<header style="margin-left: 550px; color: rgb(0, 163, 228);">
  <h1>CRUISE OPTIONS</h1>
</header>
<div id="main" style="border-style: ridge;">
  <p>Click <a href="">HERE</a> to see Cruiseline Options</p>
    <!--<form action="empty-for-now" name="myForm">
        <div><b>Amount borrowed: </b><?php echo $amount ?></div>
        <div><b>Annual interest apr: </b><?php echo $apr ?>%</div>
        <div><b>Number of years: </b><?php echo $term ?>years</div>
        <div style="margin-bottom: 40px;" id="output"><b>Monthly Payment: </b>
        $<?php computePayment() ?></div>
    </form>-->
</div>
</body>
</html>