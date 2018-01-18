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

		 ?>
		<form name="frmadd_sp" method="POST" enctype="multipart/form-data">
		
		<h3>Thêm mới Sản Phẩm</h3>
			<div class="form-group">
				<label>Tên Sản Phẩm</label>
				<input type="text" name="sp_title" value="<?php if(isset($_POST['sp_title'])){echo $_POST['sp_title'];} ?>" class="form-control" placeholder="Tên sản phẩm">
				
			</div>
			<div class="form-group">
				<label>Loại Sản Phẩm</label> <br/>
                <select class="form-control" name="sp_cat">
                <option value="null">Chọn loại sản phẩm</option>
                 <?php
                      
                      $get_cat="select * from categories";
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
                <option value="null">Chọn nhãn hiệu</option>
                <?php
                      
                      $get_brand="select * from nhanhieu";
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
				<label>Hình Ảnh</label>
				<input type="file" name="sp_image" size="30" value="choose file">
			</div>
            <div class="form-group">
				<label>Giá</label>
				<input type="text" name="sp_price" value="<?php if(isset($_POST['sp_price'])){echo $_POST['sp_price'];} ?>" class="form-control" placeholder="Giá Sản Phẩm">
				
			</div>
            <div class="form-group">
				<label>Mô Tả</label>
				<input type="text" name="sp_chitiet" value="<?php if(isset($_POST['sp_chitiet'])){echo $_POST['sp_chitiet'];} ?>" class="form-control" placeholder="mô tả sản phẩm">
			
			</div>
            <div class="form-group">
				<label>keywords</label>
				<input type="text" name="sp_keywords" value="<?php if(isset($_POST['sp_keywords'])){echo $_POST['sp_keywords'];} ?>" class="form-control" placeholder="sp_keywordsword">
			
			</div>
				
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
		<?php
		if(isset($_POST['submit'])){
     		$sp_title=$_POST['sp_title'];
		    $sp_nhanhieu=$_POST['sp_brands'];
		    $sp_date=date('m-d-y');
		    $sp_keywords=$_POST['sp_keywords'];
		    $sp_cat=$_POST['sp_cat'];
	        $sp_detail=$_POST['sp_chitiet'];
	        $sp_gia=$_POST['sp_price'];
	        $sp_image=$_FILES['sp_image'] ['name'];
		    $sp_image_tmp=$_FILES['sp_image'] ['tmp_name'];

      if($sp_title=='' OR $sp_nhanhieu=='Null' OR $sp_keywords=='' OR $sp_cat=='Null' OR $sp_detail=='' OR $sp_image==''){
        
        echo "<script>alert('Vui lòng điền đầy đủ tất cả thông tin')</script>";
        exit();
      }
      else{
        move_uploaded_file($sp_image_tmp,"image_admin/$sp_image");
        
        $insert_sp = "insert into sp (sp_cat,sp_nhanhieu,sp_title,sp_gia,sp_chitiet,sp_image,sp_keywords,sp_date) values ('$sp_cat','$sp_nhanhieu','$sp_title','$sp_gia','$sp_detail','$sp_image','$sp_keywords', '$sp_date')";
 
        $run_sp=mysqli_query($dbc,$insert_sp);
        echo "<script>alert('bạn đã thêm thành công')</script>";

      }
    }

		?>
	</div>
</div>
<?php include('includes/footer.php') ?>