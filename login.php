<style type="text/css">

	body { background-image: url(cookiez.jpg); }

</style>
<?php
	
	session_start();
	include 'dbconnect.php';

	$email = mysql_real_escape_string($_POST['email']);
	$userPass = mysql_real_escape_string($_POST['userPass']);

	$_SESSION['email'] = $email;

	$query = "SELECT * FROM login WHERE email = '$email' AND userPass = '$userPass'";

	$result = mysqli_query($con, $query) or die ("Failed to query database: " . mysqli_error($con));

	$row = mysqli_num_rows($result);

	if ($row == 1) { header('Location: loginPage.php'); }

	else
	{
		echo "<center style='color:white;'><h1>Error</h1>";
		echo "Username or password does not match!";
		echo '<br><br><a href="login.html"><button>Return</button>';
	}

	mysqli_close($con);
?>