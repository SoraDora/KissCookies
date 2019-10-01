<style>
	
	body { background-image: url(coffeecandy3.jpg); }

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
	<?php

		session_start();
		include 'dbconnect.php';

		$cookieID	   = mysql_real_escape_string($_POST['cookieID']);
		$totCookies	   = mysql_real_escape_string($_POST['totCookies']);
		$date	 	   = mysql_real_escape_string($_POST['date']);
		$email		   = $_SESSION['email'];
		$totPrice	   = 0;
		
		$_SESSION['cookieID'] = $cookieID;

		$sql1 = "SELECT cookiePrice FROM cookie WHERE cookieID = '$cookieID'";
		$result = mysqli_query($con, $sql1);

		if($result)
		{
			while($row = mysqli_fetch_array($result, MYSQL_ASSOC))
			{
				$cookiePrice = $row['cookiePrice'];
				$totPrice = $cookiePrice * $totCookies;
			}
		}

		else { die( 'Error: ' . mysqli_error()); }

		$sql2 = "INSERT INTO cookieorder(email,cookieID,totCookies,totPrice,ddate,orderStat)
				VALUES ('$email','$cookieID','$totCookies','$totPrice','$date','Pending')";

		if(mysqli_query($con, $sql2))
		{
			echo "<center style='color:white;'><h1>Success!</h1>";
			echo "Your order has been succesfully been placed!";
			echo '<br><br><a href="loginPage.php"><button>Home</button></center>';
		}

		else { die( 'Error: ' . mysqli_error($sql2)); }

		mysqli_close($con);
	?>
</html>