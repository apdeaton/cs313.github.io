<?php
  if(isset($_POST['confirm'])){
    $fName = "THANKS FOR GIVING US YOUR MONE-.....CONFIRMING YOUR ORDER....";
  }
    if(isset($_POST['cancel'])){
    $fName = "YOU'VE CANCELED YOUR ORDER.....THANKS FOR NOTHIN'!....";
  }
?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>HTML Form Confirmation Page</title>

<link rel="stylesheet" href="assign05styles.css">
</head>

<body>
<header style="margin-left: 560px;">
  <h1>Confirm your Order</h1>
</header>
<div id="main" style="border-style: ridge; background-color: cyan;">
  <?php echo $fName; ?>
</div>
</body>
</html>