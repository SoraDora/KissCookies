<?php
	session_start();
	include 'dbconnect.php';

	$bakerName = mysql_real_escape_string($_POST['bakerPass']);
	$bakerPass = mysql_real_escape_string($_POST['bakerName']);

	$sql = "SELECT * FROM baker
			WHERE bakerName = '$bakerName'
			AND bakerPass = '$bakerPass'";

	$result = mysqli_query ($con, $sql)

	or die("Failed to query database" . mysql_error());

	$row = mysqli_fetch_array($result);

	if ($row['bakerName'] == $bakerName && $row['bakerPass'] == $bakerPass){ header('Location: bakerPage.php'); }

	else { echo "Failed to login"; }

	$_SESSION['bakerName'] = $bakerName;
	$_SESSION['bakerID'] = $bakerID;
?>