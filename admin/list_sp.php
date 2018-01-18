<?php include('includes/header.php') ?>
<?php 
include('../inc/myconnect.php');
include('../inc/function.php');
        $result = mysqli_query($dbc, 'select count(*) as total from sp');
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
		<h3>Danh sách sản phẩm</h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>  ID </th>
					<th> Tên sản phẩm</th>
					<th> Nhãn Hiệu </th>
					<th> Chủng Loại </th>
					<th> Hình Ảnh </th>
					<th> Giá </th>
					<th> Chi Tiết </th>
					<th> Keywords </th>
					<th> Edit </th>
					<th> Delete </th>
				</tr>
			</thead>
			<tbody>
								
						<?php
							$get_sp="select * from sp,nhanhieu,categories where cat_id=sp_cat and nhanhieu_id = sp_nhanhieu LIMIT $start,$limit";
							$run_sp=mysqli_query($dbc,$get_sp);
							while ($row_sp=mysqli_fetch_array($run_sp)){
								$sp_id=$row_sp['sp_id'];
								$sp_title=$row_sp['sp_title'];
								$sp_brand=$row_sp['sp_nhanhieu'];
								$sp_cate=$row_sp['sp_cat'];
								$sp_image=$row_sp['sp_image'];
								$sp_price=$row_sp['sp_gia'];
								$sp_detail=substr($row_sp['sp_chitiet'], 0,120);
								$sp_keywords=$row_sp['sp_keywords'];
								$brand=$row_sp['nhanhieu_title'];
								$cat=$row_sp['cat_title'];
								
						?>
						<tr>
							<td>  <?php echo $sp_id; ?> </td>
							<td>  <?php echo $sp_title; ?> </td>
							<td>  <?php echo $brand; ?> </td>
							<td>  <?php echo $cat; ?> </td>
							<td>  <?php echo "<img src='image_admin/$sp_image' width='30' height='30' >"; ?></td>
							<td>  <?php echo $sp_price."VNĐ"; ?> </td>
							<td class="chitiet">  <?php echo $sp_detail; ?> <span>.....</span></td>
							<td>  <?php echo $sp_keywords; ?> </td>
							<td align="center"><a href="edit_sp.php?sp_id=<?php echo $row_sp['sp_id']; ?>"><img width="16" src="../images/icon_edit.png"></a></td>
							<td align="center"><a onclick="return confirm('Bạn có thật sự muốn xóa không')" href="delete_sp.php?sp_id=<?php echo $row_sp['sp_id']; ?>"><img width="16" src="../images/icon_delete.png"></a></td>
			
						</tr>
						
						

						<?php
						# code...
					}
				 ?>
			</tbody>
		</table>
	</div>
	<div class="pagination pag">
           <?php 
            if ($current_page > 1 && $total_page > 1){
                echo '<a href="list_sp.php?page='.($current_page-1).'">Prev</a> | ';
            }
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page){
                    echo '<span>'.$i.'</span> | ';
                }
                else{
                    echo '<a href="list_sp.php?page='.$i.'">'.$i.'</a> | ';
                }
            }
            if ($current_page < $total_page && $total_page > 1){
                echo '<a href="list_sp.php?page='.($current_page+1).'">Next</a> | ';
            }
           ?>
        </div>
</div>
<?php include('includes/footer.php')  ?>