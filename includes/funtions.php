
<?php 
	include('database.php');
		function getIp() {
		    $ip = $_SERVER['REMOTE_ADDR'];
		 
		    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		        $ip = $_SERVER['HTTP_CLIENT_IP'];
		    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		    }
		    return $ip;
		}
		function get_cart(){
			global $con;
			if (isset($_GET['add_cart'])) {
				$pro_id=$_GET['add_cart'];
				$ip=getIp();
				$select_cart="select * from cart where ip_add='$ip' AND cart_id='$pro_id'";
				$run_select_cart=mysqli_query($con,$select_cart);
				if($row_cart=mysqli_num_rows($run_select_cart)>0){
					
				}
				else{
					$insert_cart="insert into cart(cart_id,ip_add,qty) values('$pro_id','$ip',1)";
					$run_insert_cart=mysqli_query($con,$insert_cart);
					header('location:index.php');
				}
			}
		}

		function get_cart_cat(){
			global $con;
			if (isset($_GET['add_cart'])) {
				$pro_id=$_GET['add_cart'];
				$ip=getIp();
				$select_cart="select * from cart where ip_add='$ip' AND cart_id='$pro_id'";
				$select_sp="select * from sp where sp_id='$pro_id'";
				$run_sp=mysqli_query($con,$select_sp);
				$run_select_cart=mysqli_query($con,$select_cart);
				while ($row_sp=mysqli_fetch_array($run_sp)) {
					$cat_id=$row_sp['sp_cat'];
				}
				if($row_cart=mysqli_num_rows($run_select_cart)>0){
					
				}
				else{
					$insert_cart="insert into cart(cart_id,ip_add,qty) values('$pro_id','$ip',1)";
					$run_insert_cart=mysqli_query($con,$insert_cart);
					header('location:cate.php?cat='.$cat_id);
				}
			}
		}

		function get_cart_brand(){
			global $con;
			if (isset($_GET['add_cart'])) {
				$pro_id=$_GET['add_cart'];
				$ip=getIp();
				$select_cart="select * from cart where ip_add='$ip' AND cart_id='$pro_id'";
				$select_sp="select * from sp where sp_id='$pro_id'";
				$run_sp=mysqli_query($con,$select_sp);
				$run_select_cart=mysqli_query($con,$select_cart);
				while ($row_sp=mysqli_fetch_array($run_sp)) {
					$brand_id=$row_sp['sp_nhanhieu'];
				}
				if($row_cart=mysqli_num_rows($run_select_cart)>0){
					
				}
				else{
					$insert_cart="insert into cart(cart_id,ip_add,qty) values('$pro_id','$ip',1)";
					$run_insert_cart=mysqli_query($con,$insert_cart);
					header('location:brand.php?brands='.$brand_id);
				}
			}
		}

		function get_cart_detail(){
			global $con;
			if (isset($_GET['add_cart'])) {
				$pro_id=$_GET['add_cart'];
				$ip=getIp();
				$select_cart="select * from cart where ip_add='$ip' AND cart_id='$pro_id'";
				$select_sp="select * from sp where sp_id='$pro_id'";
				$run_sp=mysqli_query($con,$select_sp);
				$run_select_cart=mysqli_query($con,$select_cart);
				while ($row_sp=mysqli_fetch_array($run_sp)) {
					$brand_id=$row_sp['sp_nhanhieu'];
				}
				if($row_cart=mysqli_num_rows($run_select_cart)>0){
					header('location:detail.php?sp_id='.$pro_id);
				}
				else{
					$insert_cart="insert into cart(cart_id,ip_add,qty) values('$pro_id','$ip',1)";
					$run_insert_cart=mysqli_query($con,$insert_cart);
					header('location:detail.php?sp_id='.$pro_id);
				}
			}
		}


		function total_cart(){
			global $con;
				if (isset($_GET['add_cart'])) {
					$ip=getIp();
					$select_cart="select * from cart where ip_add='$ip'";
					$run_select_cart=mysqli_query($con,$select_cart);
					$num_sp=mysqli_num_rows($run_select_cart);
				}
				else{
					$ip=getIp();
					$select_cart="select * from cart where ip_add='$ip'";
					$run_select_cart=mysqli_query($con,$select_cart);
					$num_sp=mysqli_num_rows($run_select_cart);
				}
				echo $num_sp;
		}
		function price_cart(){
			$tong=0;
			global $con;
			$ip=getIp();	
			$sel_price="select * from cart where ip_add='$ip'";
			$run_price=mysqli_query($con,$sel_price);
			while($row_cart=mysqli_fetch_array($run_price)){
				$sp_id=$row_cart['cart_id'];
				$select_sp="select * from sp where sp_id='$sp_id'";
				$run_sel_sp=mysqli_query($con,$select_sp);
				while($row_sp=mysqli_fetch_array($run_sel_sp)){
					$sp_price=array($row_sp['sp_gia']);
					$value=array_sum($sp_price);
					$tong+=$value;
				}
			}
			echo $tong;
		}
?>