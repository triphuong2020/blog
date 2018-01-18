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
		
		<form name="frmadd_nhanhieu" method="POST">
		<h3>Thêm mới nhãn hiệu</h3>
			<div class="form-group">
				<label>Tên Nhãn Hiệu</label>
				<input type="text" name="nhanhieu_title" value="<?php if(isset($_POST['nhanhieu_title'])){echo $_POST['nhanhieu_title'];} ?>" class="form-control" placeholder="Tên Nhãn Hiệu">
				
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
		</form>
		<?php
		if(isset($_POST['submit'])){
      		$nhanhieu_title=$_POST['nhanhieu_title'];
      		if($nhanhieu_title==''){
      			echo "<script>alert('Vui lòng điền đầy đủ tất cả thông tin')</script>";
        		exit();
      		}
      		else
      		{
      			$insert_nhanhieu = "INSERT INTO nhanhieu (nhanhieu_title) value ('$nhanhieu_title')";
      			$run_nhanhieu = mysqli_query($dbc, $insert_nhanhieu);
      			echo "<script>alert('bạn đã thêm thành công')</script>";	
      		}
      	}
      ?>
	</div>
</div>
<?php include('includes/footer.php') ?>