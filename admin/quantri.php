
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php session_start(); ?>
<form id="form1" name="form1" method="get" action="">
  <table width="113" height="79" border="1">
  <tr>
  	<td>
    	 	<?php echo  $_SESSION['taikhoan']; ?>
    </td>
  </tr>
    <tr>
      <td width="162" height="23" id="" ><a href="quantri.php?id=TheLoai">Thể Loại</a></td>
      
    </tr>
    <tr>
      <td height="23" id=""><a href="quantri.php?id=LoaiTin">Loại tin</a></td>
    </tr>
    <tr>
      <td height="23" id=""><a href="quantri.php?id=Tin">Tin</a></td>
    </tr>
  </table>
</form>
<?php
	include('../inc/myconnect.php');
	$a = $_GET['id'];
	if($a == "TheLoai")
	{
		
		include('list_theloai_1.php');
	}
	if($a == "LoaiTin")
	{
		include('list_loaitin_1.php');
	}
	if($a == "Tin")
	{
		include('list_tin_1.php');
	}
	
?>
</body>
</html>