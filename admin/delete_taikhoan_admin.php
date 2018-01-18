
<?php 
include('../inc/myconnect.php');
include('../inc/function.php');
if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$id=$_GET['id'];
	$query="DELETE FROM quantri WHERE id={$id}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location:list_taikhoan_admin.php');
}
else{
	header('Location:list_taikhoan_admin.php');
}
?> 