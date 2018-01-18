<!DOCTYPE html>
<?php include('includes/funtions.php');
  session_start();
 ?>
<html>
<head>
	<title> Shoes Pro </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">
  	
  	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<header>
	<?php
		include("includes/database.php");
	?>
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
		<?php get_cart_detail(); ?>
		<div class="content-detail">
			<div class="row-content-detail">
				<?php 
					if(isset($_GET['sp_id'])){
						$sp_id=$_GET['sp_id'];
						include("includes/database.php");
						$select_sp="select * from sp where sp_id='$sp_id'";
						$run_select_sp=mysqli_query($con,$select_sp);
						while($row_sp=mysqli_fetch_array($run_select_sp)){
							$sp_title=$row_sp['sp_title'];
							$sp_gia=$row_sp['sp_gia'];
							$sp_chitiet=$row_sp['sp_chitiet'];
							$sp_image=$row_sp['sp_image'];
							$sp_date=$row_sp['sp_date'];
							$sp_nhanhieu=$row_sp['sp_nhanhieu'];
							$select_brands="select * from nhanhieu where nhanhieu_id='$sp_nhanhieu'";
							$run_select_brands=mysqli_query($con,$select_brands);
							$row_brands=mysqli_fetch_array($run_select_brands);
							$nhanhieu=$row_brands['nhanhieu_title'];
							
							
							echo "<div class='sp'>
										<div><img src='admin/image_admin/$sp_image'></div>
										<h1> $sp_title</h1>
										<h1> Giá: $sp_gia VNĐ</h1>
										<h3> Hãng sản xuất: $nhanhieu </h3>
										<div class='detail'>
											<span> Ngày update: $sp_date </span>
											<div class='text-content'><p><span>Thông tin sản phẩm:</span> $sp_chitiet</p></div>
										</div>
									</div>
							<div class='clearfix'></div>";
						}
					
					
					echo "<div class='col-md-4 col-4'>
								<div class='thumbnail thumb-fix'>
						 			<p><a href='detail.php?add_cart=$sp_id' class='btn btn-primary btn-fix' role='button'><button> Thêm vào giỏ hàng </button></a></p>
								</div>
							</div>";
						}
						
				 ?>

			</div><!--row-content-->
		</div><!--content-detail-->
			


	</div><!--container-->
</section>

<footer id="main-footer">
	<div class="content-footer">
		<p> Terms & Conditions Privacy Policy &copy; 2014 adidas Group </p>
	</div>
</footer>
</body>
</html>