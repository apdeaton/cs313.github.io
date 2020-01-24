<?php
    session_start();
      
   //print_r($_SESSION["cart"]);

    

?>
<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>CART</title>

<link rel="stylesheet" href="assign05styles.css">
</head>

<body onload="loadFunction()">
<header style="margin-left: 620px;">
  <h1 style="font-size: 60px;">CART</h1>
</header>
<div id="main" style="border-style: ridge; font-size: 25px; background-color: cyan;">
    <b>ITEMS CURRENTLY IN YOUR CART</b> <br>
    <p><i> <?php print_r($_SESSION["cart"]);  ?></i> </p><br>
    <a href="shoppingcart.php">Go Back to Order Screen</a>
</div>
</body>
</html>