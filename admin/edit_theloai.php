<?php ob_start() ?>//Khởi tạo bộ nhớ đệm
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
		//Kiểm tra xem ID có phải kiểu số không
		if(isset($_GET['cat_id']) && filter_var($_GET['cat_id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
		{
			$cat_id=$_GET['cat_id'];
		}
		else
		{
			header('Location:list_theloai.php');
			exit();//Neu no khong ton tai no se khong thuc hien tiep, va thoat ra
		}
		//Kiểm tra submit có tồn tại không
		if ($_SERVER['REQUEST_METHOD']=='POST') {
			$errors=array();
			if (empty($_POST['cat_title'])) {
				$errors[]='cat_title';
			}
			else{
				$cat_title=$_POST['cat_title'];				
			}
			
			if(empty($errors)) {
				$query="UPDATE categories SET cat_title='{$cat_title}' WHERE cat_id={$cat_id}";
				$result=mysqli_query($dbc,$query);
				kt_query($result,$query);
				if (mysqli_affected_rows($dbc)==1) {
					echo "<script>alert('Sửa thể loại thành công !')</script>";

					# code...
				}
				else{
					echo "<script>alert('Sửa không thành công !')</script>";
				}
			}
			else
			{
				echo "<script>alert('bạn chưa nhập đầy đủ thông tin !')</script>";
			}	
		}
		//Khai báo biến $query_id
		$query_id="SELECT cat_title FROM categories WHERE cat_id={$cat_id}
		 ";	
		$result_id=mysqli_query($dbc,$query_id);
		kt_query($result_id,$query_id);
		//Kiểm tra xem id có tồn tại hay không
		if(mysqli_num_rows($result_id)==1) {
			list($cat_title)=mysqli_fetch_array($result_id,MYSQLI_NUM);
		}
		else
		{
			echo "<script>alert('id không tồn tại!')</script>";
		}
	?>
		<form name="frmadd_theloai" method="POST">
		<h3>Sửa Thể Loại</h3>
			<div class="form-group">
				<label>Tên Thể Loại</label>
				<input type="text" name="cat_title" value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-control" placeholder="Tên Thể Loại">
				
			</div>
			<input type="submit" name="submit" class="btn btn-primary" value="Sửa">
		</form>
	</div>
</div>
<?php include('includes/footer.php') ?>
<?php ob_flush() ?>