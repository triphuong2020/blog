
<?php 
include('../inc/myconnect.php');
include('../inc/function.php');
if(isset($_GET['customers_id']) && filter_var($_GET['customers_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$customers_id=$_GET['customers_id'];
	$query="DELETE FROM customers WHERE customers_id={$customers_id}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location:list_taikhoan.php');
}
else{
	header('Location:list_taikhoan.php');
}
?> 