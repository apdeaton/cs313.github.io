<?php

  if(isset($_POST['amount'])){
    $amount = $_POST['amount'];
  }
  if(isset($_POST['apr'])){
    $apr = $_POST['apr'];
  } 
  if(isset($_POST['term'])){
    $term = $_POST['term'];
  }    

function computePayment(){
    //remember we have to declare these 3 variables again because the variable above are not in the 
    //functions scope.  That's how php works, unless they're SUPER Globals I believe.
    $amount = $_POST["amount"];
    $apr = $_POST["apr"];
    $term = $_POST["term"];
    
    $decimalApr = $apr / 100;
    $monthlyApr = $decimalApr / 12;
    $totalPeriods = 12 * $term;
    $payment = (($amount * $monthlyApr) * pow((1 + $monthlyApr), $totalPeriods)) / 
                  (pow((1 + $monthlyApr), $totalPeriods) - 1 );
    $payment = round($payment  * 100) / 100;
    echo $payment;
}

?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Loan Calculator</title>
<script>

</script>
<link rel="stylesheet" href="assign05styles.css">
</head>

<body>
<header style="margin-left: 550px;">
  <h1>Mortgage Calculator</h1>
</header>
<div id="main" style="border-style: ridge;">
    <form action="empty-for-now" name="myForm">
        <div><b>Amount borrowed: </b><?php echo $amount ?></div>
        <div><b>Annual interest apr: </b><?php echo $apr ?>%</div>
        <div><b>Number of years: </b><?php echo $term ?>years</div>
        <div style="margin-bottom: 40px;" id="output"><b>Monthly Payment: </b>
        $<?php computePayment() ?></div>
    </form>
</div>
</body>
</html>