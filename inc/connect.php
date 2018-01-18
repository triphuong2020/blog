<?php
	$conn=mysql_connect("localhost","root","")or die("Kết nối thất bại");// viết kết nối với mysql
	mysql_select_db("shoes_shop",$conn)or die("databasae không tồn tại");//chọn database kết nối
	mysql_query("SET NAMES 'utf8'"); // định dạng kiểu tiếng việt	
	
?>