<?php
session_start();

?>

<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>HTML Form</title>
<script>
var beefCounter = 0;  //These counters are to help handle when a box is unchecked.
var beansCounter = 0;
var baconCounter = 0;
var bulletsCounter = 0;
var beef = 0;
var beans = 0;
var bacon = 0;
var bullets = 0;

//counter in case nothing was added to cart
var cartCounter = 0;

function validateBeef() {
  var amount = 1.00;
  beefCounter++;
  if (beefCounter % 2 != 0) {
    beef = amount;
  }
  else
    beef = 0;
  computePrice();
}
function validateBeans() {
  var amount = 2.00;
  beansCounter++;
  if (beansCounter % 2 != 0) {
    beans = amount;
  }
  else
    beans = 0;
  computePrice();
}
function validateBacon() {
  var amount = 3.00;
  baconCounter++;
  if (baconCounter % 2 != 0) {
    bacon = amount;
  }
  else
    bacon = 0;
  computePrice();
}
function validateBullets() {
  var amount = 4.00;
  bulletsCounter++;
  if (bulletsCounter % 2 != 0) {
    bullets = amount;
  }
  else
    bullets = 0;
  computePrice();
}
function validateForms() {
  var fName = document.forms["myForm"]["fName"].value;
  var lName = document.forms["myForm"]["lName"].value;
  var address = document.forms["myForm"]["address"].value;
  var phone = document.forms["myForm"]["phone"].value;
  var creditCard = document.forms["myForm"]["credit_card"].value;
  var expiration = document.forms["myForm"]["expiration"].value;
  if (fName == "" || lName == "" || address == "" || phone == "" || creditCared == "" || 
  expiration == "") {
    document.getElementById('submitError').innerHTML = 'Please fill out all areas in the form before submitting!';
    if (fName == "") {
        document.getElementById('fName').focus();
    }
    else if (lName == "") {
        document.getElementById('lName').focus();
    }
    else if (address == "") {
        document.getElementById('address').focus();
    }
    else if (phone == "") {
        document.getElementById('phone').focus();
    }
    else if (creditCard == "") {
        document.getElementById('creditCard').focus();
    }
    else if (expiration == "") {
        document.getElementById('expiration').focus();
    }
    return false;
  }
  else {
    document.getElementById('submitError').innerHTML = '';
    return false;
  }
}

function validatePhone() {
    var phone = document.getElementById('phone').value;
    var patt = /\d{3}-\d{3}-\d{4}$/;
    if (!phone.match(patt)) {
      var result = 'Invalid phone number!  Please try again!';
      document.getElementById('phoneError').innerHTML = result;
    }
    if (phone.match(patt)) {
      var result = 'Invalid phone number!  Please try again!';
      document.getElementById('phoneError').innerHTML = '';
    }
}
function validateCardNumber() {
    var cardNumber = document.getElementById('credit_card').value;
    var patt = /^\d{16}$/;
    if (!cardNumber.match(patt)) {
      var result = 'Invalid card number! Please try again!';
      document.getElementById('cardError').innerHTML = result;
    }
    if (cardNumber.match(patt)) {
      document.getElementById('cardError').innerHTML = '';
    }
}
function validateExpiration() {
    var expiration = document.getElementById('expiration').value;
    var patt = /(^(0[1-9]|10|11|12)\/(20(17|16|15|14|13|12|10|09|08|07|06|05|04|03|02|01|00))$)/;
    if (expiration.match(patt)) {
      var result = 'Invalid expiration! Please try again!';
      document.getElementById('expError').innerHTML = result;
    }
    if (!expiration.match(patt)) {
      document.getElementById('expError').innerHTML = '';
    }
}
function resetEverything(){
    document.getElementById('phoneError').innerHTML = '';
    document.getElementById('cardError').innerHTML = '';
    document.getElementById('expError').innerHTML = '';
    document.getElementById('submitError').innerHTML = '';
    beefCounter = 0; 
    beansCounter = 0;
    baconCounter = 0;
    bulletsCounter = 0;
    beef = 0;
    beans = 0;
    bacon = 0;
    bullets = 0;
    document.getElementById('total').innerHTML = 'Total:';
}
function loadFunction() {
    alert("Page has successfully loaded! Please secure your survival-kit NOW!!!");
}
function computePrice() {
    var total = beef + beans + bacon + bullets;
    document.getElementById('total').innerHTML = 'Total: $' + total;
}

function addToCart() {

  var item = [];
  
  if (document.getElementById("beef").checked == true) {
    item.push("Beef ");
  }
  if (document.getElementById("beans").checked == true) {
    item.push("Beans ");
  }
  if (document.getElementById("bacon").checked == true) {
    item.push("Bacon ");
  }
  if (document.getElementById("bullets").checked == true) {
    item.push("Bullets ");
  }

  var xhttp = new XMLHttpRequest();
      var i = 0;
      var x = "";
      var j = "";
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
        }
      };
      xhttp.open("GET", "shoppingcartaddcart.php?item=" + item, true);
      xhttp.send();
}
</script>
<link rel="stylesheet" href="assign05styles.css">
</head>

<body onload="loadFunction()">
<header style="margin-left: 620px;">
  <h1>Survival Kit</h1>
</header>
<div id="main" style="border-style: ridge; background-color: cyan;">
    <form action="shoppingcartconfirmation.php" name="myForm"  onreset="resetEverything()"
    onsubmit="return validateForms()" method="post">
        <div>First Name: <input type="text" id="fName" name="fName"></div>
        <div>Last Name: <input type="text" id="lName" name="lName"></div>
        <div>Address (Street, City, State, Zip): <input type="text" id="address" name="address">
        </div>
        <div>Phone(In the format: xxx-xxx-xxxx): <input type="text" id="phone" name="phone"
        onchange="validatePhone()"></div>
        <div class="error" id="phoneError"></div>
    
        
            <div style="text-decoration: underline;"><b>Survival Supplies</b></div>
            <p><input type="checkbox" id="beef" name="item[]" value="Beef"
            onclick="validateBeef()">Beef -  $1.00</p>
            <p><input type="checkbox" id="beans"  name="item[]" value="Beans"
            onclick="validateBeans()">Beans - $2.00</p>
            <p><input type="checkbox" id="bacon"  name="item[]" value="Bacon"
            onclick="validateBacon()">Bacon - $3.00</p>
            <p><input type="checkbox" id="bullets"  name="item[]" value="Bullets"
            onclick="validateBullets()">Bullets - $4.00</p>
            
            <div style="margin-bottom: 20px;" id="total">Total:</div>
            <input type="button" onclick="addToCart()" value="Add Cart" ></button><br><br>
            <!--<button type="submit" value="Add Cart" >Add to Cart</button><br><br>-->
            <button><a href="shoppingcartviewcart.php" value="View Cart">View Cart</a></button>
        <br>
        <br>
        <div id="testDiv"></div>
        <br>
        <div style="text-decoration: underline;"><b>Payment Method</b></div>
        <p><input type="radio" name="card_type" value="Visa">Visa</p>
        <p><input type="radio" name="card_type" value="Mastercard">Mastercard</p>
        <p><input type="radio" name="card_type" value="American Express">American Express</p>
        
        <div>Credit Card No: <input type="text" id="credit_card" name="credit_card" 
        onchange="validateCardNumber()" pattern="^\d{16}$"></div>
        <div class="error" id="cardError"></div>
        
        <div>Exp(MM/YYYY): <input type="text" id="expiration" name="expiration" 
        onchange="return validateExpiration()"></div>
        <div class="error" id="expError"></div>
        
        <input type="submit" value="Complete Order">
        <input id="clear" type="reset" value="Reset Order">
        <div class="error" id="submitError"> </div>
    </form>
</div>
</body>
</html>