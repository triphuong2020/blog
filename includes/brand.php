<ul class="nav nav-pills nav-brands">
			  <li role="presentation" class="active"><a href="#"> Nhãn Hiệu </a></li>
			  <?php 
			    	$select_nhanhieu="select * from nhanhieu";
			    	$run_select_nhanhieu=mysqli_query($con,$select_nhanhieu);
			    	while ($row_nhanhieu=mysqli_fetch_array($run_select_nhanhieu)){
			    		$nhanhieu_id=$row_nhanhieu['nhanhieu_id'];
			    		$nhanhieu_title=$row_nhanhieu['nhanhieu_title'];
			    		echo "<li role='presentation'><a href='brand.php?brands=$nhanhieu_id'>$nhanhieu_title</a></li>";
			    	}
		    	?>
			</ul>