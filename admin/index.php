<?php
session_start();

if (!isset($_SESSION['username'])) {
	 header('Location: login.php');
}
?>
<?php include('includes/header.php') ?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
					Xin chào quản trị viên: <?php echo $_SESSION['tenquantri'];  ?><br/>
					<br/>
					<small><?php date_default_timezone_set('Asia/Ho_Chi_Minh'); echo "Bây giờ là :".date('H:i:s')." ngày ".date('d/m/Y');  ?></small>
					</h1>
						<ol class="breadcrumb">
							<li class="active">
								<i class="fa fa-dashboard"></i>&nbsp;Dashboard
							</li>
						</ol>	
				</div>
			</div>
		</div>
	</div>							
<?php include('includes/footer.php') ?>		

