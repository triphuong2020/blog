<?php 
include('../inc/myconnect.php');
include('../inc/function.php');
if(isset($_GET['nhanhieu_id']) && filter_var($_GET['nhanhieu_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
  $nhanhieu_id=$_GET['nhanhieu_id'];
  $query="DELETE FROM nhanhieu WHERE nhanhieu_id={$nhanhieu_id}";
  $result=mysqli_query($dbc,$query);
  kt_query($result,$query);
  header('Location:list_nhanhieu.php');
}
else{
  header('Location:list_nhanhieu.php');
}
?>