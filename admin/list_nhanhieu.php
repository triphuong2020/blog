<?php include('includes/header.php') ?>
<?php 
include('../inc/myconnect.php');
include('../inc/function.php'); 
?>
<div class="row pull-right" style="width: 80%; margin-right: 50px">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<h3>Danh sách nhãn hiệu</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>  ID </th>
					<th> Tên nhãn hiệu</th>
					<th> Edit </th>
					<th> Delete </th>
				</tr>
			</thead>
			<tbody>
				<?php
							$get_nhanhieu="select * from nhanhieu";
							$run_nhanhieu=mysqli_query($dbc,$get_nhanhieu);
							while ($row_nhanhieu=mysqli_fetch_array($run_nhanhieu)){
								?>
								<tr>
									<td>  <?php echo $row_nhanhieu['nhanhieu_id']; ?> </td>
									<td>  <?php echo $row_nhanhieu['nhanhieu_title']; ?> </td>
									<td align="center"><a href="edit_loaitin.php?id=<?php echo $loaitin['idLT']; ?>"><img width="16" src="../images/icon_edit.png"></td>
									<td align="center"><a onclick="return confirm('Bạn có thật sự muốn xóa không')" href="delete_nhanhieu.php?nhanhieu_id=<?php echo $nhanhieu['nhanhieu_id']; ?>"><img width="16" src="../images/icon_delete.png"></a></td>
			
								</tr>
								<?php
							}
				?>
				</tbody>
		</table>
	</div>
</div>
<?php include('includes/footer.php')  ?>
				
