<?php   
	session_start(); //to ensure you are using same session
	session_unset(); //destroy the session
	header("Location: login.html");
	exit();
?>