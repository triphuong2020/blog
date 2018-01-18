<?php
	session_start();
	include ('includes/database.php');
	unset($_SESSION['name']);
	header('location:index.php');
?>