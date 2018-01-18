<?php 
include('../inc/myconnect.php');
include('../inc/function.php');
if(isset($_GET['idTin']) && filter_var($_GET['idTin'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
	$idTin=$_GET['idTin'];
	$query="DELETE FROM tin WHERE idTin={$idTin}";
	$result=mysqli_query($dbc,$query);
	kt_query($result,$query);
	header('Location:list_tin.php');
}
else{
	header('Location:list_tin.php');
}
?>