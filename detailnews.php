<!DOCTYPE html>
<?php include('includes/funtions.php'); ?>
<?php session_start(); ?>
<html>
<head>
	<title> Shoes Pro </title>
	<script type="text/javascript" href="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body data-spy="scroll">
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
			<?php
				if(isset($_GET['news_id'])){
					$post_id=$_GET['news_id'];
					include("includes/database.php");
					$get_posts="select * from news where news_id='$post_id'";
					$run_posts=mysqli_query($con, $get_posts);
					while ($rows_posts=mysqli_fetch_array($run_posts))
					{
						$post_title=$rows_posts['news_title'];
						$post_date=$rows_posts['news_date'];
						
						$post_image=$rows_posts['news_image'];
						$post_content=$rows_posts['news_content'];

						echo "	
								<div class='detail'>
									<div class='text'>
										<h1>$post_title</h1>
										<center><img src='admin/image_news/$post_image' width='300' height='300' ></center>
										<div class='text-content'>$post_content</div>
										<h3> Upload: $post_date</h3>
									</div>
								</div>
							<div class='clearfix'></div>
						";
					}
				}
			?>
		</div>
	</section>



	<footer id="main-footer">
		<div class="content-footer">
			<p> Terms & Conditions Privacy Policy &copy; 2014 adidas Group </p>
		</div>
	</footer>
</body>
</html>