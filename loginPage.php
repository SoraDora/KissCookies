<?php 

  session_start(); 
  include 'dbconnect.php';
  $email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html>
<style>

nav {

    background-color: #34495e;
    height: 80px;
    position: fixed;
    width: 100vw;
    top: 0;
    z-index: 999;

}

body {

	font-family: sans-serif;
	background: url(coffeecandy3.jpg);

}

.sidenav {

    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;

}

.sidenav a {

    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s

}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {

    position: absolute;
    top: 0;
    right: 10px;
    font-size: 35px;
    margin-left: 50px;

}

#main {

    transition: margin-left .5s;
    padding: 10px;

}

@media screen and (max-height: 450px) {

  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}

}

#logo {height: 80px; margin-left: 20px;}

.wrapper {

    padding: 10px 50px;
    max-width: 1200px;
    text-align: center;
    margin-left: auto;
    margin-right: auto;

}

.right {float: right !important;}
/* Image zoom on hover + Overlay colour */
.parent {

    width: 45%;
    margin: 10px;
    height: 265px;
    overflow: hidden;
    position: relative;
    float: left;
    display: inline-block;
  	border: 5px solid #8B4513;

}

.child {

    height: 100%;
    width: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;

}

/* Several different images */
.bg-one {background-image: url(chocchip.jpg);}
.bg-two {background-image: url(cornflakes.jpg);}
.bg-three {background-image: url(walnut.jpg);}
.bg-four {background-image: url(chocflakes.jpg);}

b {

    display: none;
    font-size: 35px;
    color: #ffffff !important;
    font-family: sans-serif;
    text-align: center;
    margin: auto;
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    height: 80px;
    /*text-decoration: none;*/

}

.parent:hover .child, .parent:focus .child {

    -ms-transform: scale(1.1);
    -moz-transform: scale(1.1);
    -webkit-transform: scale(1.1);
    -o-transform: scale(1.1);
    transform: scale(1.1);

}

.parent:hover .child:before, .parent:focus .child:before {

    display: block;
    opacity: 0.7;

}

.parent:hover b, .parent:focus b {

    display: block;

}

.child:before {

    content: "";
    display: block;
  	opacity: 0;
    height: 100%;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background-color: rgba(52,73,94,0.75);
      -webkit-transition: all .3s ease;
    -moz-transition: all .3s ease;
    -o-transition: all .3s ease;
    transition: all .3s ease;

}

/* Media Queries */
@media screen and (max-width: 960px) {

    .parent {width: 100%; margin: 20px 0px}
    .wrapper {padding: 10px 20px;}

}

</style>
<body>
<title>Main Page</title>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <hr><br><a href="order.html">Orders<br><hr></a>
  <br><a href="history.php">History<br><hr></a>
  <br><a href="about.html">About<br><hr></a>
  <br><br><br><br>
  <br><br><br><br>
  <br><br><br><hr><br>
  <a href="logoutUser.php">Logout</a>
</div>

<div id="main">
  <span style="font-size:30px;color:white;cursor:pointer" onclick="openNav()">&#9776;
  <?php

  if( isset($_SESSION['email'])!="" ){ echo "Welcome, " .$_SESSION['email'] ."!"; }

  ?>
  </span>
</div>

<script>
function openNav() {

    document.getElementById("mySidenav").style.width = "210px";
    document.getElementById("main").style.marginLeft = "210px";

}

function closeNav() {

    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";

}

</script>
<div class="wrapper">
  <div class="parent" onclick="">
    <div class="child bg-one">
      <b href="#">Chocolate Chip<br>RM11.20</b>
    </div>
  </div>

  <div class="parent right" onclick="">
    <div class="child bg-two">
      <b href="#">Cornflakes<br>RM13.80</b>
    </div>
  </div>

  <div class="parent" onclick="">
    <div class="child bg-three">
      <b href="#">Walnut<br>RM15.50</b>
    </div>
  </div>

  <div class="parent right" onclick="">
    <div class="child bg-four">
      <b href="#">Chocolate Flakes<br>RM17.20</b>
    </div>
  </div>
</div>
</body>
</html>