<?php
  session_start();

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

  

  $query = "SELECT * FROM scripture WHERE book = '$book'";
  foreach ($db->query($query) as $row)
  {
   print "<p><b>$row[1] " . "$row[2]:" . "$row[3]</b> - " . "\"$row[4]\"</p>\n\n";
  }
  


?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Scripture Link</title>
<script>

</script>
</head>

<body>
<header> 
</header>
Please enter a Book: 
</header>
<form method="POST">
<input name="book" type="text"><br><br>
<input name="chapter" type="text"><br><br>
<input name="verse" type="text"><br><br>
<input name="content" type="textarea"><br><br>

Select Cruise Type:
  <select name ="scripturelink" id="link" style="width: 250px; height: 25px; font-size: 15px; color: black">
  <option value="none">Choose a Topic</option>
    <option value="1">Faith</option>
    <option value="2">Sacrifice</option>
    <option value="3">Charity</option>
  </select><br><br>
<input type="submit" name= "submit" value="Submit">
</form>
    
</div>
</body>
</html>