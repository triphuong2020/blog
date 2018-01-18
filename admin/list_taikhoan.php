<?php include('includes/header.php') ?>
<?php 
include('../inc/myconnect.php');
include('../inc/function.php'); 
$result = mysqli_query($dbc, 'select count(*) as total from customers');
        $row = mysqli_fetch_assoc($result);
        $total_records = $row['total'];
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
        $limit = 8;
        $total_page = ceil($total_records / $limit);
 
       
        if ($current_page > $total_page){
            $current_page = $total_page;
        }
        else if ($current_page < 1){
            $current_page = 1;
        }
        $start = ($current_page - 1) * $limit;
 
        
        
?>
<div class="row pull-right" style="width: 80%; margin-right: 50px">
	<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
		<h3>Danh sách tài khoản người dùng</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>  ID </th>
					<th> Tên người dùng</th>
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
							$get_cus="select * from customers LIMIT $start,$limit";
							$run_cus=mysqli_query($dbc,$get_cus);
							while ($row_cus=mysqli_fetch_array($run_cus)){
								$customers_id=$row_cus['customers_id'];
								$cus_ten=$row_cus['customers_namereal'];
								$cus_name=$row_cus['customers_name'];
								$cus_pass=$row_cus['customers_pass'];
								$cus_email=$row_cus['customers_email'];
								$cus_diachi=$row_cus['customers_address'];
								$cus_sdt=$row_cus['customers_contact'];

								?>
								<tr>
									<td>  <?php echo $customers_id; ?> </td>
									<td>  <?php echo $cus_ten; ?> </td>
									<td>  <?php echo $cus_name; ?> </td>
									<td>  <?php echo $cus_pass; ?> </td>
									<td>  <?php echo $cus_email; ?> </td>
									<td>  <?php echo $cus_diachi; ?> </td>
									<td>  <?php echo $cus_sdt; ?> </td>
									<td align="center"><a onclick="return confirm('Bạn có thật sự muốn xóa không')" href="delete_taikhoan.php?customers_id=<?php echo $row_cus['customers_id']; ?>"><img width="16" src="../images/icon_delete.png"></td>
			
								</tr>
								<?php
							}
				?>
			
				</tbody>
		</table>
	</div>
	<div class="pagination">
           <?php 
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="list_taikhoan.php?page='.($current_page-1).'">Prev</a> | ';
            }
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="list_taikhoan.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="list_taikhoan.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>
</div>
<?php include('includes/footer.php')  ?>
				
