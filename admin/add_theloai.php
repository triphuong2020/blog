<style type="text/css">
.required
{
	color: red;
}
</style>
<?php include('includes/header.php') ?>
<div class="row" style="width: 80%; float: right; margin: 50px 50px 0px 0px;">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
	<?php 
		include('../inc/myconnect.php');
		include('../inc/function.php');
		?>
		
		<form name="frmadd_theloai" method="POST">
		<h3>Thêm mới Thể Loại</h3>
			<div class="form-group">
				<label>Tên Thể Loại</label>
				<input type="text" name="cat_title" value="<?php if(isset($_POST['cat_title'])){echo $_POST['cat_title'];} ?>" class="form-control" placeholder="Tên Thể Loại">
				
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
		<?php
		if(isset($_POST['submit'])){
      		$cat_title=$_POST['cat_title'];
      		if($cat_title==''){
      			echo "<script>alert('Vui lòng điền đầy đủ tất cả thông tin')</script>";
        		exit();
      		}
      		else
      		{
      			$insert_tl = "INSERT INTO categories (cat_title) value ('$cat_title')";
      			$run_tl = mysqli_query($dbc, $insert_tl);
      			echo "<script>alert('bạn đã thêm thành công')</script>";	
      		}
      	}
      ?>
	</div>
</div>
<?php include('includes/footer.php') ?>