<?php
	session_start();
	include ('includes/database.php');
	include ('includes/funtions.php');
	$ip=getIp();
	if (isset($_GET['sp_id'])){
		$sp_id=$_GET['sp_id'];
		$delete_cart="delete from cart where cart_id='$sp_id' AND ip_add='$ip'" ;
		$run_delete=mysqli_query($con,$delete_cart);
		
		header('location:cart.php');
	}
?>