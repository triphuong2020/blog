
<?php 
include('../inc/myconnect.php');
include('../inc/function.php');
if(isset($_GET['sp_id']) && filter_var($_GET['sp_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{

	$sp_id=$_GET['sp_id'];
	//xóa ảnh
	$sql="SELECT sp_image FROM sp WHERE sp_id={$sp_id}";
	$query_a= mysqli_query($dbc,$sql);
	$anh = mysqli_fetch_assoc($query_a);
	unlink('image_admin/'.$anh['sp_image']);
	$query="DELETE FROM sp WHERE sp_id={$sp_id}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location:list_sp.php');
}
else{
	header('Location:list_sp.php');
}
?>