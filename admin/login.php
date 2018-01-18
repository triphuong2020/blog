<?php session_start(); ?>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);

body {
  background: #456;
  font-family: 'Open Sans', sans-serif;
}

.login {
  width: 400px;
  margin: 16px auto;
  font-size: 16px;
}

/* Reset top and bottom margins from certain elements */
.login-header,
.login p {
  margin-top: 0;
  margin-bottom: 0;
}

/* The triangle form is achieved by a CSS hack */
.login-triangle {
  width: 0;
  margin-right: auto;
  margin-left: auto;
  border: 12px solid transparent;
  border-bottom-color: #28d;
}

.login-header {
  background: #28d;
  padding: 20px;
  font-size: 1.4em;
  font-weight: normal;
  text-align: center;
  text-transform: uppercase;
  color: #fff;
}

.login-container {
  background: #ebebeb;
  padding: 12px;
}

/* Every row inside .login-container is defined with p tags */
.login p {
  padding: 12px;
}

.login input {
  box-sizing: border-box;
  display: block;
  width: 100%;
  border-width: 1px;
  border-style: solid;
  padding: 16px;
  outline: 0;
  font-family: inherit;
  font-size: 0.95em;
}

.login input[type="email"],
.login input[type="password"] {
  background: #fff;
  border-color: #bbb;
  color: #555;
}

/* Text fields' focus effect */
.login input[type="email"]:focus,
.login input[type="password"]:focus {
  border-color: #888;
}

.login input[type="submit"] {
  background: #28d;
  border-color: transparent;
  color: #fff;
  cursor: pointer;
}

.login input[type="submit"]:hover {
  background: #17c;
}

/* Buttons' focus effect */
.login input[type="submit"]:focus {
  border-color: #05a;
}
</style>

         
      <?php
        include('../inc/myconnect.php');
        include('../inc/function.php');
        if($_SERVER['REQUEST_METHOD' ]=='POST');
        {
          $errors= array();
          if(empty($_POST['username']))
          {
            $errors[]='username';
          }
          else
          {
            $username=$_POST['username'];
          }
          if(empty($_POST['pass']))
          {
            $errors[]='pass';
          }
          else
          {
            $pass=md5($_POST['pass']);
            
          }
          if(empty($errors))
          {
            $query="SELECT id,username,pass,tenquantri FROM quantri WHERE username='{$username}' AND pass='{$pass}' ";
            $result = mysqli_query($dbc,$query);kt_query($result,$query);
            if(mysqli_num_rows($result)==1)
            {
              list($id,$username,$pass,$tenquantri)=mysqli_fetch_array($result,MYSQLI_NUM);
              $_SESSION['uid']=$id;
              $_SESSION['username']=$username;
              $_SESSION['tenquantri']=$tenquantri;
              header('Location: index.php');
            }
            else
            {
              echo "<script>alert('Thông tin tài khoản hoặc mật khẩu không chính xác !')</script>";
            }
            
            
          }
        }
      ?>
<div class="login">
  <div class="login-triangle"></div>
  
  <h2 class="login-header">Log in</h2>

  <form class="login-container" method="post">
    <p><input type="text" name="username" placeholder="Username"></p>
    <p><input type="password" name="pass" placeholder="Password"></p>
    <p><input type="submit" value="Log in"></p>
  </form>
</div>