<?php
  /*session_start();

$book;
if(isset($_POST["book"])){
    $book = $_POST["book"];
}


print "<h1>Scripture Resources</h1>";
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
  
  foreach ($db->query('SELECT * FROM scripture WHERE book = \'' . $book'\'') as $row)
  {
   print "<p><b>$row[1] " . "$row[2]:" . "$row[3]</b> - " . "\"$row[4]\"</p>\n\n";
  }
  
*/

?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Scripture Database</title>
<script>

</script>
</head>

<body>
<header>
Please enter a Book: 
</header>

    
</div>
</body>
</html>