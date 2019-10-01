<style type="text/css">

	body { background-image: url(flower.jpg); }

</style>
<?php 
	
	include 'dbconnect.php';

	$email = mysql_real_escape_string($_POST['email']);
	$userPass = mysql_real_escape_string($_POST['userPass']);
    $custName = mysql_real_escape_string($_POST['custName']);
    $custPhone = mysql_real_escape_string($_POST['custPhone']);
    $custAddress = mysql_real_escape_string($_POST['custAddress']);

    $check = mysqli_query($con, "SELECT * FROM login WHERE email = '$email'");
    $checkrows = mysqli_num_rows($check);

	if ($checkrows > 0)
   	{
   		echo "<center><h1>Error</h1>";
		echo "Email is already in use. Try again!";
		echo '<br><br><a href="registerPage.html"><button>Return</button>';
	}

	else
	{
		$query1 = " INSERT INTO login(email,userPass)
                    VALUES ('$email','$userPass')";

        $query2 = " INSERT INTO customer(email,custName,custPhone,custAddress)
                    VALUES ('$email','$custName','$custPhone','$custAddress')";

        $res1 = mysqli_query($con, $query1);
        $res2 = mysqli_query($con, $query2);

		if ($res1 && $res2) { header('Location: login.html'); }

		else
		{
			echo "Error: " . $query1 . "<br>" . mysqli_error($con);
			echo "Error: " . $query2 . "<br>" . mysqli_error($con);
		}
	}

	mysqli_close($con);
?>