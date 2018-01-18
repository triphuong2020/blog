<style type="text/css">
.required
{
	color: red;
}
</style>
<?php include('includes/header.php') ?>
<div class="row" style="width: 80%; float: right; margin: 50px 50px 0px 0px;">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<?php 
		include('../inc/myconnect.php');
		include('../inc/function.php');

	?>
		<form name="frmadd_taikhoan" method="POST">
		
		<h3>Thêm Tài Khoản Admin: </h3>
			<div class="form-group">
				<label>Họ Và Tên</label>
				<input type="text" name="Ten" value="<?php if(isset($Ten)){echo $Ten;} ?>" class="form-control" placeholder="Họ và Tên">
				
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="text" name="username" value="<?php if(isset($username)){echo $username;} ?>" class="form-control" placeholder="Username">
				
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="pass" value="<?php if(isset($pass)){echo $pass;} ?>" class="form-control" placeholder="Password">
				
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" name="email" value="<?php if(isset($email)){echo $email;} ?>" class="form-control" placeholder="Email">
				
			</div>
			<div class="form-group">
				<label>Địa Chỉ</label>
				<input type="text" name="diachi" value="<?php if(isset($diachi)){echo $diachi;} ?>" class="form-control" placeholder="Địa chỉ">
				
			</div>
			<div class="form-group">
				<label>Số điện thoại</label>
				<input type="text" name="sdt" value="<?php if(isset($sdt)){echo $sdt;} ?>" class="form-control" placeholder="Số điện thoại">
				
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
		<?php
			if(isset($_POST['submit'])){
		      $Ten=$_POST['Ten'];
		      $username=$_POST['username'];
		      $pass=$_POST['pass'];
		      $pass1= md5($pass);
		      $email=$_POST['email'];
		      $diachi=$_POST['diachi'];
		      $sdt=$_POST['sdt'];
		      
			if($Ten=='' OR $username=='' or $pass==''  OR $email=='' OR $diachi=='' or $sdt== '')
			{
				echo "<script>alert('Vui lòng điền đầy đủ tất cả thông tin')</script>";
        		exit();
			}else{
					$sql="select * from quantri where username='$username'";
					$kt=mysqli_query($dbc, $sql);
					if(mysqli_num_rows($kt)  > 0){
						echo "<script>alert('Tài khoản này đã tồn tại !')</script>";
					}
					else
					{
						$insert_taikhoan1 = "INSERT INTO quantri (tenquantri,username,pass,email,diachi,sdt) values 
							('$Ten','$username','$pass1','$email','$diachi','$sdt')";
							$run_taikhoan1 = mysqli_query($dbc,$insert_taikhoan1);
							echo "<script>alert('bạn đã thêm thành công')</script>";

					}

			}
			
			
		}
		?>
	</div>
</div>
<?php include('includes/footer.php') ?>
			
					
				


			