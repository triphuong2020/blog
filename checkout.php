
<?php 	include('includes/funtions.php');
		include("includes/database.php");
  session_start();
  	if (isset($_POST['buy'])){

  	}
	if (isset($_POST['login'])) {
	$name=$_POST['name'];
	$password=$_POST['password'];
	$s_c="select * from customers where customers_name='$name' AND customers_pass='$password'";
	$run_s_c=mysqli_query($con,$s_c);
		if ($num=mysqli_num_rows($run_s_c)==0){
			echo "<script>alert('Password or ID không đúng, Vui lòng đăng nhập lại')</script>";
		}
		else{
			while($row_c=mysqli_fetch_array($run_s_c)){

				$realname=$row_c['customers_namereal'];
				$_SESSION['name']=$realname;
				$_SESSION['id_name']=$row_c['customers_id'];
				$_SESSION['password']=$row_c['customers_pass'];
				$_SESSION['email']=$row_c['customers_email'];
				$_SESSION['address']=$row_c['customers_address'];
				$_SESSION['phone']=$row_c['customers_contact'];
			}
			echo"<script>window.open('index.php','_self')</script>";	
		}
	}
	if (isset($_POST['buy'])) {
		$ip=getIp();
		$sel="select * from cart where ip_add='$ip' " ;
		$run_sel=mysqli_query($con,$sel);
		$num_cart=mysqli_num_rows($run_sel);
		if ($num_cart==0){
			echo"<script>alert('Bạn Chưa mua món hàng nào , vui lòng vào cửa hàng để mua hàng nhé')</script>";
		}
		else{
			$order_date=date('m-d-y');
			$order_id_user = $_SESSION['id_name']; 
			$order_name=$_SESSION['name'];
			$order_address=$_SESSION['address'];
			$order_phone=$_SESSION['phone'];
			$order_email=$_SESSION['email'];
			$order_tongtien=$_SESSION['tong'];
			while($row=mysqli_fetch_array($run_sel)){
				$id=$row['cart_id'];
				$qty=$row['qty'];
				$insert="insert into donhang (order_date,order_address,order_name,order_email,order_phone,order_sp_id,order_sp_qty,id_user) values ('$order_date','$order_address','$order_name','$order_email','$order_phone','$id','$qty','$order_id_user')";
				$run_insert=mysqli_query($con,$insert);
		}
		$delete_cart="delete from cart where ip_add='$ip'" ;
		$run_delete=mysqli_query($con,$delete_cart);
		$_SESSION['tong']=0;
		echo "<script>alert('Bạn đã đặt hàng thành công, chúng tôi sẽ sớm liên hệ với bạn')</script>";
		echo"<script>window.open('checkout.php','_self')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Shoes Pro </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/style_checkout.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	<script type="text/javascript" href="js/style.js" ></script>
</head>
<body>
<header>
	
	<div class="container">
		<div class="row row-fix">
			  <div class="col-md-8 row-8"><img src="image/nike.png" width="300"></div>
			  <div class="col-md-4 row-4"><img src="image/shoes.png" width="300"></div>
		</div>
	</div><!--container-->
</header>

<section>
	<div class="container menu"> 
		<?php include('includes/menu.php'); ?>

	</div><!--menu-->

	<div class="container">
		<div class="brands">
			<?php include('includes/brand.php'); ?>
		</div>
		<?php get_cart(); ?>
		<?php
				if(isset($_SESSION['name'])){
					
		?>
				<div class="content content-bill">
					<div class="row">
							<div class="col-md-12 head-bill"><h1> Đơn Hàng Của Bạn </h1></div>
								
							<div class="col-md-6 left">Họ Tên Khách Hàng: </div>
							<div class="col-md-6"><?php echo $_SESSION['name']; ?></div>
							<div class="col-md-6 left"> Địa chỉ giao hàng: </div>
							<div class="col-md-6"><?php echo $_SESSION['address']; ?></div>
							<div class="col-md-6 left"> Email: </div>
							<div class="col-md-6"><?php echo $_SESSION['email']; ?></div>
							<div class="col-md-6 left"> Sô điện thoại: </div>
							<div class="col-md-6"><?php echo $_SESSION['phone']; ?></div>
							<div class="col-md-6 left"><div> Đơn hàng:</div> </div>
							<div class="col-md-6">
								<?php 
									$ip=getIp();
									$sel="select * from cart where ip_add='$ip'" ;
									$run_sel=mysqli_query($con,$sel);
									$num_cart=mysqli_num_rows($run_sel);
									if ($num_cart==0) {
										echo "<div> Empty </div>";
									}
									else{
										while($row=mysqli_fetch_array($run_sel)){
											$id=$row['cart_id'];
											$qty=$row['qty'];
											$select_sp="select * from sp where sp_id='$id'";
											$run_sel_sp=mysqli_query($con,$select_sp);
											while($row_sp=mysqli_fetch_array($run_sel_sp)){
												$name_sp=$row_sp['sp_title'];
											}
											
											echo "<div>* ".$name_sp." x ".$qty."đôi</div>";
											
											
										}
									}
								?> 
							</div>
							<div class="col-md-6 left"> Thành Tiền: </div>
							<div class="col-md-6"><?php echo $_SESSION['tong']." VNĐ"; ?></div>
							<form action="" method="post" enctype="multipart/form-data">
								<div class="col-md-12" ><input type="submit" name="buy" value="Đặt Hàng" class="btn btn-primary btn-fix" ></div>
							</form>

					</div>

				</div>
		<?php }
				

		else { ?>
		<div class="content">
			<div class="row-content">
			<div class="container checkout">
			        <div class="row">
						<div class="col-md-6 col-md-offset-3">
							<div class="panel panel-login">
								<div class="panel-heading">
									<div class="row">
										<div class="col-xs-6">
											<a href="#" class="active" id="login-form-link">Login</a>
										</div>
										<div class="col-xs-6">
											<a href="register.php" id="register-form-link">Register</a>
										</div>
									</div>
									<hr>
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-lg-12">
											<form id="login-form" action="#" method="post" role="form" style="display: block;">
												<div class="form-group">
													<input type="text" name="name" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
												</div>
												<div class="form-group">
													<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
												</div>
												<div class="form-group text-center">
													<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
													<label for="remember"> Remember Me</label>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-sm-6 col-sm-offset-3">
															<input type="submit" name="login" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="row">
														<div class="col-lg-12">
															<div class="text-center">
																<a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
															</div>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div><!--row-content-->
		</div><!--content-->
<?php } ?>


	</div><!--container-->
</section>

<footer id="main-footer">
	<div class="content-footer">
		<p> Terms & Conditions Privacy Policy &copy; 2014 adidas Group </p>
	</div>
</footer>
</body>
</html>