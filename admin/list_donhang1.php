<?php include('includes/header.php') ?>
<?php 
include('../inc/myconnect.php');
include('../inc/function.php'); 
$result = mysqli_query($dbc, 'select count(*) as total from donhang');
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
					<th> ID khách hàng </th>
					<th> Tên sản phẩm</th>
					<th> Số lượng</th>
					<th> Tên khách hàng</th>
					<th> Số điện thoại</th>
					<th> Gmail</th>
					<th> Địa chỉ</th>
					<th> Ngày đặt</th>
					<th> Delete </th>
				</tr>
			</thead>
			<tbody>
				<?php
							$get_dh="select * from donhang ,sp  where sp_id =order_sp_id LIMIT $start,$limit";
							$run_dh=mysqli_query($dbc,$get_dh);
							while ($row_dh=mysqli_fetch_array($run_dh)){
								$id=$row_dh['id'];
								$tensp=$row_dh['sp_title'];
								$sl=$row_dh['order_sp_qty'];
								$name=$row_dh['order_name'];
								$sdt=$row_dh['order_phone'];
								$email=$row_dh['order_email'];
								$diachi=$row_dh['order_address'];
								$date=$row_dh['order_date'];
								
								?>
								<tr>
									<td>  <?php echo $id; ?> </td>
									<td>  <?php echo $tensp; ?> </td>
									<td>  <?php echo $sl; ?> </td>
									<td>  <?php echo $name; ?> </td>
									<td>  <?php echo $sdt; ?> </td>
									<td>  <?php echo $email; ?> </td>
									<td>  <?php echo $diachi; ?> </td>
									<td>  <?php echo $date; ?> </td>
									<td align="center"><a onclick="return confirm('Bạn có thật sự muốn xóa không')" href="delete_donhang.php?id=<?php echo $row_dh['id']; ?>"><img width="16" src="../images/icon_delete.png"></td>
			
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
                echo '<a href="list_donhang1.php?page='.($current_page-1).'">Prev</a> | ';
            }
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="list_donhang1.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="list_donhang1.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>
</div>
<?php include('includes/footer.php')  ?>
				
