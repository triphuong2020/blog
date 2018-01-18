<?php include('includes/header.php') ?>
<?php 
include('../inc/myconnect.php');
include('../inc/function.php'); 
?>
<div class="row pull-right" style="width: 80%; margin-right: 50px">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<h3>Danh sách thể loại</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>  ID </th>
					<th> Tên thể loại</th>
					<th> Edit </th>
					<th> Delete </th>
				</tr>
			</thead>
			<tbody>
				<?php
							$get_tl="select * from categories";
							$run_tl=mysqli_query($dbc,$get_tl);
							while ($row_tl=mysqli_fetch_array($run_tl)){
								$cat_id=$row_tl['cat_id'];
								$cat_title=$row_tl['cat_title'];
								?>
								<tr>
									<td>  <?php echo $cat_id; ?> </td>
									<td>  <?php echo $cat_title; ?> </td>
									<td align="center"><a href="edit_theloai.php?cat_id=<?php echo $row_tl['cat_id'];?>"><img width="16" src="../images/icon_edit.png"></td>
									<td align="center"><a onclick="return confirm('Bạn có thật sự muốn xóa không')" href="delete_theloai.php?cat_id=<?php echo $row_tl['cat_id'] ;?>"><img width="16" src="../images/icon_delete.png"></a></td>
			
								</tr
								><?php
							}
				?>
				</tbody>
		</table>
	</div>
</div>
<?php include('includes/footer.php')  ?>
