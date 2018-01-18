<!DOCTYPE html>
<?php session_start(); ?>
<html>
<?php include('includes/funtions.php'); ?>
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
		<div class="content">
			<div class="row-content">
				<?php include('includes/content.php') ?>
			</div><!--row-content-->
		</div><!--content-->



	</div><!--container-->
</section>

<footer id="main-footer">
	<div class="content-footer">
		<p> Terms & Conditions Privacy Policy &copy; 2014 adidas Group </p>
	</div>
</footer>
</body>
</html>