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
		<div class="news">
			<div class='row'>
			<?php
				include("includes/database.php");
				$paper=1;
				$numrow=3;
				if(isset($_GET["paper"]))
				{
					$paper=$_GET["paper"];// nếu nhấn vào trang nào đó ta gán số trang đó cho $paper 	
				}
				$start=($paper-1)*$numrow;
				$get_sp="select * from news order by news_id limit $start,$numrow";
				$run_posts=mysqli_query($con,$get_sp);

				while ($rows_posts=mysqli_fetch_array($run_posts))
				{
					$post_id=$rows_posts['news_id'];
					$post_title=$rows_posts['news_title'];
					$post_date=$rows_posts['news_date'];
					$post_image=$rows_posts['news_image'];
					$post_content=substr($rows_posts['news_content'], 0,300);

					echo "
							<div class='eachnew'>
								<div class='col-md-9 new-width'>
									<div class='col-md-12 title'>
										<h1>$post_title <span> $post_date</span> </h1> 
									</div>
									<div class='col-md-3'>
										<a href='#' class='thumbnail'>
											<img  src='admin/image_news/$post_image' width='100' height='100' >
										</a>
									</div>
									<div class='text-content'>$post_content <a href='detailnews.php?news_id=$post_id'>....Read More </a>
									</div>
								</div>
							</div>
					";
				}
			?>
				</div>
				<center><ul class="pagination pag">
					<?php
						$sqldem="select count(*) as maxrow from news";// đếm số dòng trong cơ sở dữ liệu
						$resultdem=mysqli_query($con,$sqldem);
						$rowdem=mysqli_fetch_array($resultdem);
						$maxrow=$rowdem["maxrow"];//gán số dòng cho biến $maxrow	
						$totalpaper=ceil($maxrow/$numrow);// ta dùng ceil nếu chia hết thì giữ nguyên ngược lại thì tăng lên 1 paper 
						$linktrang="news.php";// gán link hiển thị hoặc dùng $_SERVER["PHP_SELF"]
						$nav="";// tạo link chuyển hướng
						for($numpaper=1;$numpaper<=$totalpaper; $numpaper++)
						{
							if($numpaper==$paper)//nếu là trang hiện tại
							{
								$nav.="<li class='active'><a href=#>$numpaper</a><li>";
							}
							else
							{
								$nav.="<li><a href='$linktrang?paper=$numpaper'>$numpaper</a></li>" ;// tạo link cho các trang khác	
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
						
							echo "$prev $nav $next " ;	
					?>
				</ul></center>
			</div><!--news-->

	</div><!--container-->
</section>

<footer id="main-footer">
	<div class="content-footer">
		<p> Terms & Conditions Privacy Policy &copy; 2014 adidas Group </p>
	</div>
</footer>
</body>
</html>