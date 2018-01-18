<?php
	
//Kết nối cơ sở dữ liệu
$con=mysqli_connect('localhost','root','','shop123');
//Nếu kết nối không thành công thì in ra lỗi
if (!$con) {
	echo "Kết nối không thành công";
	# code...
}
else{
	mysqli_set_charset($con,'utf8');
}

?>