<?php
  session_start();

  if(isset($_POST['fName'])){
    $fName = htmlspecialchars($_POST['fName']);
  }
  if(isset($_POST['lName'])){
    $lName = htmlspecialchars($_POST['lName']);
  }
  if(isset($_POST['address'])){
    $address = htmlspecialchars($_POST['address']);
  }
  if(isset($_POST['phone'])){
    $phone = htmlspecialchars($_POST['phone']);
  }
  
  
  
  if(isset($_POST['card_type'])){
  $card_type = htmlspecialchars($_POST['card_type']);
  }
  
  if(isset($_POST['expiration'])){
  $expiration = htmlspecialchars($_POST['expiration']);
  }
  

  
  //This is the total price of all items chosen
  $price = 0;
  
  //this function NEEDS to have the array as a parameter. Remember the array is not in the functions
  //scope above, even though it's not mentioned in any function.  
  function checkItems($item) {
    /*foreach ($item as $items){
      if ($items == "Beef") {
        $addCode = "<td><b>Price: </b>\$1.00</td></tr></table>";
        $GLOBALS["price"] += 1;
      }
      if ($items == "Beans") {
        $addCode = "<td><b>Price: </b>\$2.00</td></tr></table>";
        $GLOBALS["price"] += 2;
      }
      if ($items == "Bacon") {
        $addCode = "<td><b>Price: </b>\$3.00</td></tr></table>";
        $GLOBALS["price"] += 3;
      }
      if ($items == "Bullets") {
        $addCode = "<td><b>Price: </b>\$4.00</td></tr></table>";
        $GLOBALS["price"] += 4;
      }
      echo "<table style=\"width: 50%\" ><tr><td><b>Item: </b>$items</td>".$addCode;
    }   */ 

    foreach ($_SESSION as $items){
      $addCode;
      if ($items == "Beef") {
        $addCode = "<td><b>Price: </b>\$1.00</td></tr></table>";
        $GLOBALS["price"] += 1;
      }
      if ($items == "Beans") {
        $addCode = "<td><b>Price: </b>\$2.00</td></tr></table>";
        $GLOBALS["price"] += 2;
      }
      if ($items == "Bacon") {
        $addCode = "<td><b>Price: </b>\$3.00</td></tr></table>";
        $GLOBALS["price"] += 3;
      }
      if ($items == "Bullets") {
        $addCode = "<td><b>Price: </b>\$4.00</td></tr></table>";
        $GLOBALS["price"] += 4;
      }
      echo "<table style=\"width: 50%\" ><tr><td><b>Item: </b>$items</td>";
    } 
  }
  
  
?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>HTML Form Confirm/Cancel Page</title>

<link rel="stylesheet" href="assign05styles.css">
</head>

<body>
<header style="margin-left: 560px;">
  <h1>Confirm your Order</h1>
</header>
<div id="main" style="border-style: ridge; background-color: cyan;">
    <form action="shoppingcartend.php" name="myForm" method="post">
       <div style="margin-bottom: 35px ;">
          <div style="text-decoration: underline; margin-bottom: 10px;"><b>CUSTOMER INFO</b></div>
          <div><b>First Name: </b><?php echo $fName ?></div>
          <div><b>Last Name: </b><?php echo $lName ?></div>
          <div><b>Address: </b><?php echo $address ?></div>
          <div><b>Phone: </b><?php echo $phone ?></div>
        </div>  
        
        <div style="background-color: white; border: ridge;">
          <div style="text-decoration: underline; margin-bottom: 10px;"><b>ITEMS CHOSEN</b></div>
          <div><?php checkItems($_SESSION["cart"]) ?></div><br>
          
        </div>  
        
        
        
        <div style="text-decoration: underline;"><b>PAYMENT INFORMATION</b></div>
        <p><b>Card Type: </b> <?php echo $card_type ?></p>
        <p><b>Card Expiration: </b> <?php echo $expiration ?></p>
        
        <input type="submit" name="confirm" value="Confirm">
        <input type="submit" name="cancel" value="Cancel">
    </form>
</div>
</body>
</html>