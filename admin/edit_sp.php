<?php ob_start() ?>
<style type="text/css">
.required
{
	color: red;
}
</style>
<?php include('includes/header.php') ?>
<div class="row" style="width: 80%;height: auto; float: right; margin: 50px 50px 0px 0px;">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<?php
		include('../inc/myconnect.php');
		include('../inc/function.php');
		if(isset($_GET['sp_id']) && filter_var($_GET['sp_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
		{
			$sp_id=$_GET['sp_id'];
			$sel="select * from sp where sp_id='$sp_id'";
			$run_sel=mysqli_query($dbc,$sel);
			$row=mysqli_fetch_array($run_sel);
			$image=$row['sp_image'];

		}
		else
		{
			header('Location:list_sp.php');
			exit();//Neu no khong ton tai no se khong thuc hien tiep, va thoat ra
		}
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			$errors=array();
			if (empty($_POST['sp_title'])) {
				$errors[]='sp_title';
			}
			else{
				$sp_title=$_POST['sp_title'];				
			}
			if (empty($_POST['sp_price'])) {
				$errors[]='sp_price';
				# code...
			}
			else{
				$sp_price=$_POST['sp_price'];
			}
			if(empty($_POST['sp_chitiet'])) {
				$sp_chitiet=0;
			}
			else{
				$sp_chitiet=$_POST['sp_chitiet'];
			}
			if(empty($_POST['sp_keywords'])) {
				$sp_keywords=0;
			}
			else{
				$sp_keywords=$_POST['sp_keywords'];
			}
			if(isset($_POST['bntsua'])){
		      $sp_title=$_POST['sp_title'];
		      $sp_nhanhieu=$_POST['sp_brands'];
		      $sp_date=date('m-d-y');
		      $sp_keywords=$_POST['sp_keywords'];
		      $sp_cat=$_POST['sp_cat'];
		      $sp_detail=$_POST['sp_chitiet'];
		      $sp_gia=$_POST['sp_price'];
		      $sp_image=$_FILES['sp_image'] ['name'];
		      $sp_image_tmp=$_FILES['sp_image'] ['tmp_name'];
		   
			if(empty($errors)) {
				if ($sp_image=='') {
					$sp_image=$image;
					
				}
				else{
				move_uploaded_file($sp_image_tmp,"image_admin/$sp_image");
				}
				
				$query="UPDATE sp SET sp_title='{$sp_title}',sp_cat='{$sp_cat}',sp_nhanhieu='{$sp_nhanhieu}',sp_gia='{$sp_gia}',sp_chitiet='{$sp_chitiet}',sp_image='{$sp_image}',sp_keywords='{$sp_keywords}', sp_date ='{$sp_date}' WHERE sp_id={$sp_id}";
				$result=mysqli_query($dbc,$query);
				kt_query($result,$query);
				
				if (mysqli_affected_rows($dbc)==1) {
					echo "<script>alert('Sửa sản phẩm thành công !')</script>";

					# code...
				}
				else{
					echo "<script>alert('Sửa sản phẩm không thành công !')</script>";
				}
			}
			else
			{
				echo "<script>alert('Bạn chưa nhập đầy đủ thông tin !')</script>";
			}
			}	
		}
		$query_id="SELECT sp_title,sp_cat,sp_nhanhieu,sp_gia,sp_chitiet,sp_keywords FROM SP WHERE sp_id={$sp_id}
		 ";	
		$result_id=mysqli_query($dbc,$query_id);
		kt_query($result_id,$query_id);
		//Kiểm tra xem id có tồn tại hay không
		if(mysqli_num_rows($result_id)==1) {
			list($sp_title,$sp_cat,$sp_brands,$sp_price,$sp_chitiet,$sp_keywords)=mysqli_fetch_array($result_id,MYSQLI_NUM);
		}
		else
		{
			echo "<script>alert('id không tồn tại !')</script>";
		}
	?>
	
		<form name="frmadd_sp" method="POST" enctype="multipart/form-data" action="">
		
		<h3>Sửa Sản Phẩm</h3>
			<div class="form-group">
				<label>Tên Sản Phẩm</label>
				<input type="text" name="sp_title" value="<?php if(isset($sp_title)){echo $sp_title;} ?>" class="form-control" placeholder="Tên sản phẩm">
				
			</div>
			<div class="form-group">
				<label>Loại Sản Phẩm</label> <br/>
                <select class="form-control" name="sp_cat">
                <?php  $show1 = "select * from categories where cat_id = $sp_cat"; $run_show1 = mysqli_query($dbc,$show1);
                while ($row2 = mysqli_fetch_array($run_show1)) {
                	$cat_id1 =$row2['cat_id'];
                	$cat_title1=$row2['cat_title'];
                	echo "<option value='$cat_id1'>$cat_title1</option>";
                  	# code...
                  }  ?>
                 <?php
                      
                      $get_cat="select * from categories where cat_id != $sp_cat";
                      $run_cat=mysqli_query($dbc, $get_cat);

                      while($row_cat=mysqli_fetch_array($run_cat)){
                        $cat_id=$row_cat['cat_id'];
                        $cat_title=$row_cat['cat_title'];
                        echo "<option value='$cat_id'>$cat_title</option>";
                      }
                  ?>
            </select>
			</div>
			<div class="form-group">
				<label>Nhãn Hiệu</label><br/>
				 <select class="form-control" name="sp_brands">
                <?php  $show = "select * from nhanhieu where nhanhieu_id = $sp_brands"; $run_show = mysqli_query($dbc,$show);
                while ($row1 = mysqli_fetch_array($run_show)) {
                	$brand_id1 =$row1['nhanhieu_id'];
                	$brand_title1=$row1['nhanhieu_title'];
                	echo "<option value='$brand_id1'>$brand_title1</option>";
                  	# code...
                  }  ?>
                <?php
                      
                      $get_brand="select * from nhanhieu where nhanhieu_id !=$sp_brands";
                      $run_brand=mysqli_query($dbc, $get_brand);
                      while($row_brand=mysqli_fetch_array($run_brand)){
                        $brand_id=$row_brand['nhanhieu_id'];
                        $brand_title=$row_brand['nhanhieu_title'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                      }
                  ?>
                  
            </select>
			</div>
			<div class="form-group">
				<label>Hình Ảnh</label> <br/>
				<img width="90" height="90" src="image_admin\<?php echo $image ;?>">
				<input type="hidden" name="idl" value="<?php echo "$image"; ?>" />
				<input type="file" name="sp_image" size="30" >
			</div>
            <div class="form-group">
				<label>Giá</label>
				<input type="text" name="sp_price" value="<?php if(isset($sp_price)){echo $sp_price;} ?>" class="form-control" placeholder="Giá Sản Phẩm">
				
			</div>
            <div class="form-group">
				<label>Mô Tả</label>
				<input type="text" name="sp_chitiet" value="<?php if(isset($sp_chitiet)){echo $sp_chitiet;} ?>" class="form-control" placeholder="mô tả sản phẩm">
			
			</div>
            <div class="form-group">
				<label>keywords</label>
				<input type="text" name="sp_keywords" value="<?php if(isset($sp_keywords)){echo $sp_keywords;} ?>" class="form-control" placeholder="sp_keywordsword">
			
			</div>
				
			<input type="submit" name="bntsua" class="btn btn-primary" value="Sửa">
		</form>
		
	</div>
</div>
<?php include('includes/footer.php') ?>
<?php ob_flush() ?>