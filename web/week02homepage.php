<!DOCTYPE HTML>
<html lang="en-us">
<head>
<meta charset="utf-8">
<title>Homepage</title>
<style>

</style>
<script>
function toMe() {
    location.href = "aboutme.html";
}

function toIndex() {
    location.href = "index.html";
}


</script>

<link rel="stylesheet" href="homepage.css">

</head>

<body onload="onloadFunction()" style="background-color: rgba(245, 214, 112, 0.555);"
id = "backgroundColors">

<div id="fixedHeader;">
<canvas id="myCanvas" width="1300" height="80">
Your browser does not support the canvas element.
</canvas>
<div id="div0">
    <div class="grid-container0" >
            <div class="menu1" onclick="toMe()">
                Press to learn About Me!
            </div>

            <div class="menu2" id="menu2"  onclick="toIndex()">
                Press to see Index
            </div>
    </div>
    <div id="phpCode">
        <?php
        echo "Today is " . date("l"). " " . date("Y-m-d") . "<br>";

        ?>
    </div>
</div>
</div>



<div id="collapse" style="position: relative; padding-left: 160px; padding-top: 100px; 
font-size: 0px; color: white; margin-left: -100px;">
    LOADING: PLEASE WAIT...
</div>




</body>

<script>
    window.onload = function() {
        var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    ctx.fillStyle = "orange";
    ctx.fillRect(0, 0, 1300, 100);
    
    ctx.fillStyle = "white";
    ctx.fillRect(20, 0,10,100);
    ctx.fillRect(50, 0,20,100);

    ctx.fillRect(1230, 0,20,100);
    ctx.fillRect(1270, 0,10,100);

    ctx.fillStyle="White";
    ctx.font = "77px times new roman";
    ctx.fillText("ALAN DEATON HOMEPAGE", 160,70);
};
</script>

</html>