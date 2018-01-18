<?php 
	include("includes/database.php");
	$paper=1;
	$numrow=6;
	if(isset($_GET["paper"]))
	{
		$paper=$_GET["paper"];// nếu nhấn vào trang nào đó ta gán số trang đó cho $paper 	
	}
	$start=($paper-1)*$numrow;
	$get_sp="select * from sp order by sp_id limit $start,$numrow";
	$run_sp=mysqli_query($con,$get_sp);
	while($row_sp=mysqli_fetch_array($run_sp))
	{
		$sp_id=$row_sp['sp_id'];
		$sp_title=$row_sp['sp_title'];
		$sp_chitiet=substr($row_sp['sp_chitiet'], 0,120);
		$sp_image=$row_sp['sp_image'];
		$sp_gia=$row_sp['sp_gia'];
		echo "<div class='col-md-4 col-4'>
				<div class='thumbnail thumb-fix'>
					<img src='admin/image_admin/$sp_image' alt='error' >
					    <div class='caption'>
					     <h3> $sp_title </h3>
					     <h3> Giá: $sp_gia VND </h3>
					     <p> $sp_chitiet </p>
					     <p><a href='index.php?add_cart=$sp_id' class='btn btn-primary btn-fix' role='button'><button> Thêm vào giỏ hàng </button></a> <a href='detail.php?sp_id=$sp_id' class='btn btn-default' role='button'> Chi tiết </a></p>
					     </div>
					   </div>
					 </div>";

	}
	?>
	<div class='clearfix'></div>
	<center><ul class="pagination pag">
	<?php
		$sqldem="select count(*) as maxrow from sp";// đếm số dòng trong cơ sở dữ liệu
		$resultdem=mysqli_query($con,$sqldem);
		$rowdem=mysqli_fetch_array($resultdem);
		$maxrow=$rowdem["maxrow"];//gán số dòng cho biến $maxrow	
		$totalpaper=ceil($maxrow/$numrow);// ta dùng ceil nếu chia hết thì giữ nguyên ngược lại thì tăng lên 1 paper 
		$linktrang="index.php";// gán link hiển thị hoặc dùng $_SERVER["PHP_SELF"]
		$nav="";// tạo link chuyển hướng
		for($numpaper=1;$numpaper<=$totalpaper; $numpaper++)
		{
			if($numpaper==$paper)//nếu là trang hiện tại
			{
				$nav.="<li class='active'><a href='#'>$numpaper</a><li>";
			}
			else
			{
				$nav.=" <li><a href='$linktrang?paper=$numpaper'>$numpaper</a></li>" ;// tạo link cho các trang khác	
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
		
			echo " $prev $nav $next" ;
		
?>
</ul></center>