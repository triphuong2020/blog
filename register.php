<?php 
  session_start();
  include('includes/funtions.php');
  $ip=getIP();
  $select="select * from customers";
  $run_s=mysqli_query($con,$select);
  $i=0;
  if(isset($_POST['login'])){
      $name_real=$_POST['name_real'];
      $name=$_POST['name'];
      $email=$_POST['email'];
      $address=$_POST['address'];
      $password=$_POST['password'];
      $phone=$_POST['phone'];
  if($name_real==''||$name==''|| $email=='' || $address=='' || $password=='' || $phone==''){
    echo "<script>alert('Please fill in this field')</script>";
    exit();
  }
  while ($rows_c=mysqli_fetch_array($run_s)){
        if ($email==$rows_c['customers_email']) {
          echo "<script>alert('Email này đã được đăng kí, vui lòng dùng email khác')</script>";
          $i=1;
        }
      }
  if($i==0)
      {
        $insert_custom="insert into customers(customers_namereal,customers_ip,customers_name,customers_email,customers_pass,customers_address,customers_contact) values('$name_real','$ip','$name','$email','$password','$address','$phone')";
        $run_insert_custom=mysqli_query($con,$insert_custom);
        if(isset($run_insert_custom)){
          echo "<script>alert('Bạn đã đăng kí thành công')</script>";
        }
        header('location:checkout.php');
      }
  }
 ?>
 <!DOCTYPE html>
<html>
<head>
  <title> Shoes Pro </title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="css/style_checkout.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" href="js/style.js" ></script>
    
</head>
<body>
<header>
  <?php
    include("includes/database.php");
  ?>
  <div class="container">
  <div class="row row-fix">
      <div class="col-md-8 row-8"><img src="image/nike.png" width="300"></div>
      <div class="col-md-4 row-4"><img src="image/shoes.png" width="300"></div>
    </div>
  </div><!--container-->
</header>

<section>
  <div class="container menu"> 
    <?php include('includes/menu.php'); ?>

  </div><!--menu-->

  <div class="container">
    <div class="brands">
      <?php include('includes/brand.php'); ?>
    </div>
    <?php get_cart(); ?>
    <div class="content">
      <div class="row-content">  


  <div class="container register">
    <div class="row">
      <div class="panel panel-primary">
        <div class="panel-body">
          <form method="POST" action="#" role="form">
            <div class="form-group">
              <h2>Create account</h2>
            </div>
            <div class="form-group">
              <label class="control-label" for="signupName">Họ và tên</label>
              <input name="name_real" type="text" maxlength="50" class="form-control" required="">
            </div>
            <div class="form-group">
              <label class="control-label" for="signupEmail">Email</label>
              <input name="email" type="email" maxlength="50" class="form-control" required="">
            </div>
            <div class="form-group">
              <label class="control-label" for="signupPasswordagain">Địa Chỉ</label>
              <input name="address" type="text"  class="form-control" required="">
            </div>
            <div class="form-group">
              <label class="control-label" for="signupName">ID đăng nhập</label>
              <input name="name" type="text" maxlength="50" class="form-control" required="">
            </div>
            <div class="form-group">
              <label class="control-label" for="signupPassword">Password</label>
              <input name="password" type="password" maxlength="25" class="form-control" length="40" required="">
            </div>
            <div class="form-group">
              <label class="control-label" for="signupPasswordagain"> Số điện thoại </label>
              <input name="phone" type="text" maxlength="25" class="form-control" required="">
            </div>
            <div class="form-group">
              <button name="login" type="submit" class="btn btn-info btn-block">Create your account</button>
            </div>
            <p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
            <hr>
            <p></p>Already have an account? <a href="checkout.php">Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>




        </div><!--row-content-->
    </div><!--content-->



  </div><!--container-->
</section>

<footer id="main-footer">
  <div class="content-footer">
    <p> Terms & Conditions Privacy Policy &copy; 2014 adidas Group </p>
  </div>
</footer>
</body>
</html>