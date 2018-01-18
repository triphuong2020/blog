<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE-edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="atuthor" content="">
	<title>Quản trị hệ thống</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/bootstrap-theme.min.css">
	<script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="design_demo.css">
	<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">QUẢN TRỊ HỆ THỐNG</a>
			</div>
			<!-- //Login, Logout -->	
			<ul class="nav navbar-right top-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<i class="fa fa user"></i>Xin chào: <?php echo $_SESSION['username'];  ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
						
						<li>
							<a href="doipass.php"><i class="fa fa-fw fa-gear"></i>Đổi mật khẩu</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="logout.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
						</li>
					</ul>
				</li>
			</ul>			
		</nav>
<?php include('includes/sidebar.php') ?>
	</div>
</body>	
																																														