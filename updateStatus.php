<?php

	session_start();
	include 'dbconnect.php';
	
	$orderID = $_SESSION['orderID'];
	$bakerName = $_SESSION['bakerName'];
	
	if(isset($_POST['Approved']) == 'Approved')
	{
			$sql = "UPDATE 	cookieorder
					SET 	orderStat = 'Approved', approvedBy = '$bakerName'
					WHERE 	orderID = '$orderID'";
		    		
			if(!mysqli_query($con, $sql)) { die( 'Error : ' . mysqli_error()); }

			header("Refresh:1;url=updateOrder.php");

			$message = "Succesfully approved the order!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			die();
	}

	else if(isset($_POST['Completed']) == 'Completed')
	{
			$sql = "UPDATE 	cookieorder
					SET 	orderStat = 'Completed', completedBy = '$bakerName'
					WHERE 	orderID = '$orderID'";
		    		
			if(!mysqli_query($con, $sql)) { die( 'Error : ' . mysqli_error()); }

			header("Refresh:1;url=updateOrder.php");

			$message = "Succesfully completed the order!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			die();
	}

	else if(isset($_POST['Reject']) == 'Reject')
	{
		$sql = "UPDATE 	cookieorder
				SET 	orderStat = 'Rejected', approvedBy = '$bakerName'
				WHERE 	orderID = '$orderID'";
		    		
		if(!mysqli_query($con, $sql)) { die('Error: ' .mysqli_error()); }

		header("Refresh:1;url=updateOrder.php");
		$message = "Succesfully rejected the order!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		die();
	}

	mysqli_close($con);
?>