<?php include('includes/header.php') ?>
<div class="row" style="width: 80%;height: auto; float: right; margin: 50px 50px 0px 0px;">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	
		<?php 
		include('../inc/myconnect.php');
		include('../inc/function.php');
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			
			$matkhaucu = $_POST['passcu'];
			$matkhaumoi = md5(trim($_POST['passmoi']));
			$matkhaumoi1 = $_POST['passmoi1'];
			$query ="select id, pass,username from quantri where pass =md5('{$matkhaucu}') and id = {$_SESSION['uid']}";
			$rel= mysqli_query($dbc,$query);
			kt_query($rel,$query);
			if (mysqli_num_rows($rel)==1) {
				if (trim($_POST['passmoi']) !=  trim($_POST['passmoi1'])) {
					echo "<script>alert('Mật khẩu mới không giống nhau !')</script>";
					# code...
				}
				else
				{
					$query_up = "update quantri set pass = '{$matkhaumoi}' where  id = {$_SESSION['uid']}";
					$rel_up = mysqli_query($dbc,$query_up);
					kt_query($rel_up,$query_up);
					if (mysqli_affected_rows($dbc)==1) {
						echo "<script>alert('Đổi mật khẩu thành công !')</script>";
						# code...
					}
					else
					{
						echo "<script>alert('Đổi mật khẩu không thành công !')</script>";
					}

				}
				# code...
			}
			else
			{
				echo "<script>alert('Mật khẩu cũ không đúng !')</script>";
			}
		}

		 ?>
		<form name="frmadd_sp" method="POST" enctype="multipart/form-data">
		
		<h3>Đổi Mật Khẩu</h3>
			<div class="form-group">
				<label>Tài khoản</label>
				<input type="text" name="username" value="<?php echo $_SESSION['username']; ?>"  class="form-control" placeholder="Username" disabled="true">
				
			</div>
			<div class="form-group">
				<label>Mật khẩu cũ</label>
				<input type="password" name="passcu" value="" class="form-control" placeholder="Mật khẩu cũ">
				
			</div>
			<div class="form-group">
				<label>Mật khẩu mới</label>
				<input type="password" name="passmoi" value="" class="form-control" placeholder="Mật khẩu mới">
				
			</div>
			<div class="form-group">
				<label>Xác nhận mật khẩu mới</label>
				<input type="password" name="passmoi1" value="" class="form-control" placeholder="Xác nhận mật khẩu">
				
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Đổi mật khẩu">
</div>
</div>
<?php include('includes/footer.php') ?>
