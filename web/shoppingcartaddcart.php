<?php
    session_start();
  if(isset($_GET['item'])){
        $item = $_GET['item'];
      }

      $_SESSION["cart"] = $item;

    //Code Below Counts the size of this array
    //echo count($_SESSION["cart"]);

    //Code Below accesses a particular piece of the array
    //echo $_SESSION["cart"][0];

?>