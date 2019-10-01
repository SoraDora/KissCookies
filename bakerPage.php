<?php 
    include_once 'dbconnect.php'; 
    session_start();
?>

<!DOCTYPE html>
<style>

    body
    {
    	font-family: sans-serif;
    	background: url(coffeecandy3.jpg);
    }

    button
    {
        background-color: black;
        color: white;
        padding: 14px 20px;
        border: 5px solid #8B4513;
        cursor: pointer;
    }

</style>
<html>
    <body>
        <title>Baker of Kiss Cookies</title>
        <center><br>
            <span style="font-family:sans-serif;color:white;font-size:42px;">
                <?php if( isset($_SESSION['bakerName'])!= "" ){ echo "Welcome, " . $_SESSION['bakerName'] . "!";} ?>
            </span>
            <br><br><br><br><br>
            <a href="updateOrder.php"><button>Update Orders</button></a>
            <br><br><br>
            <a href="viewOrder.php"><button>View Orders</button></a>
            <br><br><br>
            <a href="viewBakers.php"><button>View Baker</button></a>
            <a href="logoutBaker.php" style="position:absolute;bottom:5%;left:47%;"><button>Logout</button></a>
        </center>
    </body>
</html>