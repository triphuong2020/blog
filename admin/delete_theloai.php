
<?php 
include('../inc/myconnect.php');
include('../inc/function.php');
if(isset($_GET['cat_id']) && filter_var($_GET['cat_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$cat_id=$_GET['cat_id'];
	$query="DELETE FROM categories WHERE cat_id={$cat_id}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location:list_theloai.php');
}
else{
	header('Location:list_theloai.php');
}
?> 