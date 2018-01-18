<?php include('includes/header.php') ?>
<?php 
include('../inc/myconnect.php');
include('../inc/function.php'); 
?>
<div class="row pull-right" style="width: 80%; margin-right: 50px">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<h3>Danh sách  tài khoản admin</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>  ID </th>
					<th> Tên Admin</th>
					<th> Tên tài khoản</th>
					<th> Password</th>
					<th> Email</th>
					<th> Địa chỉ</th>
					<th> Số điện thoại</th>
					<th> Delete </th>
				</tr>
			</thead>
			<tbody>
				<?php
							$get_adm="select * from quantri";
							$run_adm=mysqli_query($dbc,$get_adm);
							while ($row_adm=mysqli_fetch_array($run_adm)){
								$adm_id=$row_adm['id'];
								$adm_ten=$row_adm['tenquantri'];
								$adm_name=$row_adm['username'];
								$adm_pass=$row_adm['pass'];
								$adm_email=$row_adm['email'];
								$adm_diachi=$row_adm['diachi'];
								$adm_sdt=$row_adm['sdt'];

								?>
								<tr>
									<td>  <?php echo $adm_id; ?> </td>
									<td>  <?php echo $adm_ten; ?> </td>
									<td>  <?php echo $adm_name; ?> </td>
									<td>  <?php echo $adm_pass; ?> </td>
									<td>  <?php echo $adm_email; ?> </td>
									<td>  <?php echo $adm_diachi; ?> </td>
									<td>  <?php echo $adm_sdt; ?> </td>
									
									<td align="center"><a onclick="return confirm('Bạn có thật sự muốn xóa không')" href="delete_taikhoan_admin.php?id=<?php echo $row_adm['id']; ?>"><img width="16" src="../images/icon_delete.png"></td>
			
								</tr>
								<?php
							}
				?>
				</tbody>
		</table>
	</div>
</div>
<?php include('includes/footer.php')  ?>
