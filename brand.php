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
			<?php include('includes/brand.php') ?>
		</div>
		<?php get_cart_brand(); ?>
		<div class="content">
			<div class="row-content">
			<?php
					$paper=1;
					$numrow=6;
					if(isset($_GET["paper"]))
					{
						$paper=$_GET["paper"];
					}
					if(isset($_GET['brands'])){
						$brands_id=$_GET['brands'];
						$_SESSION['brands_id']=$brands_id;
						include("includes/database.php") ;
						$start=($paper-1)*$numrow;
						$select_sp_brands="select * from sp where sp_nhanhieu='$brands_id' order by sp_id limit $start,$numrow";
						$run_sp_brands=mysqli_query($con,$select_sp_brands);
						while ($row_sp_brands=mysqli_fetch_array($run_sp_brands)){
							$sp_id=$row_sp_brands['sp_id'];
							$sp_title=$row_sp_brands['sp_title'];
							$sp_chitiet=substr($row_sp_brands['sp_chitiet'], 0,130);
							$sp_image=$row_sp_brands['sp_image'];
							$sp_gia=$row_sp_brands['sp_gia'];
							echo "<div class='col-md-4 col-4'>
									<div class='thumbnail thumb-fix'>
										<img src='admin/image_admin/$sp_image' alt='error' >
										    <div class='caption'>
										     <h3> $sp_title </h3>
										     <h3> Giá: $sp_gia </h3>
										     <p> $sp_chitiet </p>
										     <p><a href='brand.php?add_cart=$sp_id' class='btn btn-primary btn-fix' role='button'><button> Thêm vào giỏ hàng </button></a> <a href='detail.php?sp_id=$sp_id' class='btn btn-default' role='button'> Chi tiết </a></p>
										     </div>
										   </div>
										 </div>";
						}
					}
					else{
						$brands_id=$_SESSION['brands_id'];
						include("includes/database.php") ;
						$start=($paper-1)*$numrow;
						$select_sp_brands="select * from sp where sp_nhanhieu='$brands_id' order by sp_id limit $start,$numrow";
						$run_sp_brands=mysqli_query($con,$select_sp_brands);
						while ($row_sp_brands=mysqli_fetch_array($run_sp_brands)){
							$sp_id=$row_sp_brands['sp_id'];
							$sp_title=$row_sp_brands['sp_title'];
							$sp_chitiet=substr($row_sp_brands['sp_chitiet'], 0,130);
							$sp_image=$row_sp_brands['sp_image'];
							$sp_gia=$row_sp_brands['sp_gia'];
							echo "<div class='col-md-4 col-4'>
									<div class='thumbnail thumb-fix'>
										<img src='admin/image_admin/$sp_image' alt='error' >
										    <div class='caption'>
										     <h3> $sp_title </h3>
										     <h3> Giá: $sp_gia </h3>
										     <p> $sp_chitiet </p>
										     <p><a href='brand.php?add_cart=$sp_id' class='btn btn-primary btn-fix' role='button'><button> Thêm vào giỏ hàng </button></a> <a href='detail.php?sp_id=$sp_id' class='btn btn-default' role='button'> Chi tiết </a></p>
										     </div>
										   </div>
										 </div>";
						}
					}
					?>
					<center><ul class="pagination pag">
					<?php
						$sqldem="select count(*) as maxrow from sp where sp_nhanhieu='".$_SESSION['brands_id']."'";// đếm số dòng trong cơ sở dữ liệu
						$resultdem=mysqli_query($con,$sqldem);
						$rowdem=mysqli_fetch_array($resultdem);
						$maxrow=$rowdem["maxrow"];//gán số dòng cho biến $maxrow	
						$totalpaper=ceil($maxrow/$numrow);// ta dùng ceil nếu chia hết thì giữ nguyên ngược lại thì tăng lên 1 paper 
						$linktrang="brand.php";// gán link hiển thị hoặc dùng $_SERVER["PHP_SELF"]
						$nav="";// tạo link chuyển hướng
						for($numpaper=1;$numpaper<=$totalpaper; $numpaper++)
						{
							if($numpaper==$paper)//nếu là trang hiện tại
							{
								$nav.="<li class='active'><a href=#>$numpaper</a></li>";
							}
							else
							{
								$nav.=" <li><a href='$linktrang?paper=$numpaper'>$numpaper</a></li>";// tạo link cho các trang khác	
							}
						}
							
							if($paper>1)//nếu số trang lớn hơn 1 
							{
								$numpaper=$paper-1;
								$prev="<li><a href='$linktrang?paper=$numpaper'>Prev</a></li>";//trở về trang trước nên số trang bị lùi về một đơn vị
								$first="<li><a href='$linktrang?paper=1'>Trang đầu</a></li>";// về trang 1
								
							}
							else
							{
								$prev="&nbsp;";//là trang 1 thì không cần in Prev
								$first="&nbsp;";// không cần in trang đầu 
							}
							if($paper<$totalpaper)
							{
								$numpaper=$paper+1;
								$next="<li><a href='$linktrang?paper=$numpaper'>Next</a></li>";// nếu số dòng vẫn nhỏ hơn $maxdong thì ta next về phía sau 
								$last="<li><a href='$linktrang?paper=$totalpaper'>Trang cuối</a></li>";//về trang cuối	
							}
							else
							{
								$next="&nbsp;";//nếu là trang cuối ùi nên không cần in ra $next
								$last="&nbsp;";//không cần in ra trang cuoi
							}
							echo "<div class='clearfix'></div>";
							echo "$first $prev $nav $next $last" ;
							
						
				?>
				</ul></center>
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