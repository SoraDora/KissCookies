<?php

	session_start();
	include 'dbconnect.php';
	
	$orderID = $_SESSION['orderID'];
	$email = $_SESSION['email'];
	
	if(isset($_POST['Delete']) == 'Delete')
	{
		$sql = "DELETE FROM cookieorder
				WHERE orderID = '$orderID'
				AND email = '$email'";
		    		
		if(!mysqli_query($con, $sql)) { die('Error: ' .mysqli_error()); }

		header("Refresh:1;url=history.php");
		$message = "Succesfully deleted your order!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		die();
	}

	mysqli_close($con);
?>