<?php 
	if (isset($_POST['logout'])) {
		echo "minh tir ne";
	}
?>
<div class="menu1">                 
		  <ul class="nav nav-tabs nav1" role="tablist">
		    <li><a href="index.php">Home</a></li>
		    <?php 
		    	$select="select * from categories";
		    	$run_select=mysqli_query($con,$select);
		    	while ($row=mysqli_fetch_array($run_select)){
		    		$cat_id=$row['cat_id'];
		    		$cat_title=$row['cat_title'];
		    		echo "<li><a href='cate.php?cat=$cat_id'>$cat_title</a></li>";
		    	}
		    ?>
		    <li><a href="news.php"> Tin Tức </a></li>
		  </ul>
		  </div><!--menu-->

		  <div class="shopping-cart">
		  		<a href="cart.php"><span class="glyphicon glyphicon-shopping-cart icon" aria-hidden="true"></span></a>
		  		<strong><?php total_cart(); ?></strong>
		  </div>
		  <div class="login">
		 	<?php if (isset($_SESSION['name'])) {
			 		echo "<a href='checkout.php'>Chào ".$_SESSION['name']."</a>";
			 		echo "<a href='logout.php' > Đăng xuất </a>";
			 	}
			 	else{		 	
			 		echo "<a href='checkout.php'> Đăng nhập </a>";
			 		echo "<a href='register.php'> Đăng kí</a>";
			 	}	
			 ?>


			 	
		 </div>

		  <div class="Search">
		  <form method="get" action="search.php" enctype="multipart/form-data">
		    <div class="input-group input-group-lg">
		      <input type="text" class="form-control button_search" placeholder="Search" name="search-content" >
		      <div class="input-group-btn">
		        <button class="btn btn-default" type="submit" name="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span></button>
		      </div>
		    </div>
		  </form>
		 </div><!--search-->
		

		 