<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang đăng nhập</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
	 
		include('../inc/myconnect.php');
		include('../inc/function.php'); 
	if (isset($_POST["btn_submit"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		if ($username == "" || $password =="") {
			echo "username hoặc password bạn không được để trống!";
		}else{
			$sql = "select * from quantri where username = '$username' and pass = '$password' ";
			$query = mysqli_query($dbc,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "tên đăng nhập , mật khẩu không đúng hoặc tài khoản này không có không được phép đăng nhập !";
			}else{
				$_SESSION['uid'] = $id;
				$_SESSION['username'] = $username;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                header('Location: index.php');
			}
		}
	}
?>

	<form method="POST" action="login1.php">
	<fieldset>
	    <legend>Đăng nhập</legend>
	    	<table>
	    		<tr>
	    			<td>Username</td>
	    			<td><input type="text" name="username" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td>Password</td>
	    			<td><input type="password" name="password" size="30"></td>
	    		</tr>
	    		<tr>
	    			<td colspan="2" align="center"> <input name="btn_submit" type="submit" value="Đăng nhập"></td>
	    		</tr>
	    	</table>
  </fieldset>
</form>
</body>
</html>