<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php include('includes/funtions.php'); ?>
<head>
	<title> Shoes Pro </title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
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
		<?php get_cart(); ?>
	<form action="cart.php" method="post" enctype="multipart/form-data">
		<div class="content">
				<?php if(!isset($_SESSION['qty'])){
						$_SESSION['qty']=1;
					}

				?>
			<div class="row-content content-cart">
				<div class="header-cart">
					<h1> Giỏ hàng của bạn </h1>
				</div>
			<?php

					if(isset($_POST['update'])){
						for ($i=1; $i <=$_SESSION['mathang'] ; $i++) { 
							$sp_id=$_SESSION['sp_id'.$i];
							$qty=$_POST['qty'.$i];
							$_SESSION['qty'.$i]=$qty;
							$update_qty="update cart set qty='$qty' where cart_id='$sp_id'";
							$run_update=mysqli_query($con,$update_qty);				
						}
						echo "<script>alert('Update số lượng thành công')</script>	";
					
					
					}
					
				?>	
				
			<?php
					$tong=0;
					global $con;
					$ip=getIp();	
					$sel_price="select * from cart where ip_add='$ip'";
					$run_price=mysqli_query($con,$sel_price);
					$_SESSION['mathang']=mysqli_num_rows($run_price);
					$i=1;
					while($row_cart=mysqli_fetch_array($run_price)){
						$sp_id=$row_cart['cart_id'];
				 		$sp_qty=$row_cart['qty'];
						$select_sp="select * from sp where sp_id='$sp_id'";
						$run_sel_sp=mysqli_query($con,$select_sp);
						while($row_sp=mysqli_fetch_array($run_sel_sp)){
							$sp_title=$row_sp['sp_title'];
							$sp_gia=$row_sp['sp_gia'];
							$sp_image=$row_sp['sp_image'];
							$sp_nhanhieu=$row_sp['sp_nhanhieu'];
							$sp_cat=$row_sp['sp_cat'];
							$select_cat="select * from categories where cat_id='$sp_cat'";
							$run_sel_cat=mysqli_query($con,$select_cat);
								
							while ($row_cat=mysqli_fetch_array($run_sel_cat)) {
								$cat=$row_cat['cat_title'];
							}

							$select_brands="select * from nhanhieu where nhanhieu_id='$sp_nhanhieu'";
							$run_sel_brands=mysqli_query($con,$select_brands);
							while ($row_brand=mysqli_fetch_array($run_sel_brands)) {
								$brand=$row_brand['nhanhieu_title'];					
							}
							$_SESSION['sp_id'.$i]=$sp_id;
							$_SESSION['qty'.$i]=$sp_qty;
							$_SESSION['price'.$i]=$sp_gia;
							$_SESSION['image'.$i]=$sp_image;
							$_SESSION['title'.$i]=$sp_title;
							$tong_sp=$_SESSION['price'.$i]*$_SESSION['qty'.$i];
							$sp_price=array($tong_sp);
							$value=array_sum($sp_price);
							$_SESSION['cat'.$i]=$cat;
							$_SESSION['brand'.$i]=$brand;
							$tong+=$value;
							
						

				


							
						
					echo "		<div class='media cart-box'>
									  <div class='media-left'>
									    <a href='#'>
									      <img class='media-object' src='admin/image_admin/".$sp_image."' alt='Error'>
									    </a>
									  </div>";
					echo "		<div class='media-body body-sp-cart'>
									    <h4 class='media-heading'>Name:".$sp_title."</h4>
									    
									    <h5> Category:".$cat."</h5>
									    <h5> Nhãn Hiệu:".$brand."</h5>
									    <h5> Giá:".$_SESSION['price'.$i]." VNĐ</h5>
									    <span> Số lượng </span>
									    
							<input type='text' name='qty".$i."'value='".$_SESSION['qty'.$i]."' />
							

							<a href='delete.php?sp_id=".$sp_id."'class='btn btn-primary btn-fix' role='button'> Xóa </a>
									    <div class='clear-fix'></div>
									  </div>
								</div>";
							}
					$i++;														
	}

?>



					
				
			<div class="footer-content">

				<input type="submit" name="update" value="UPDATE" class="btn btn-primary btn-fix" >
				
				<a href='checkout.php' class='btn btn-primary btn-fix' role='button'> Check Out </a>
			</div>
			<div class="clear-fix"></div>
			<?php
					echo "<div class='bottom-cart'><h3> Tổng cộng: $tong VNĐ <h3></div>";
					$_SESSION['tong']=$tong;


			?>
			

			</div><!--row-content-->
		</div><!--content-->
	</form>
			

	</div><!--container-->
</section>

<footer id="main-footer">
	<div class="content-footer">
		<p> Terms & Conditions Privacy Policy &copy; 2014 adidas Group </p>
	</div>
</footer>
</body>
</html>