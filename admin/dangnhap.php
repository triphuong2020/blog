<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="319" border="1">
    <tr>
      <td width="86">Tài Khoản</td>
      <td width="217">
      <input type="text" name="taikhoan" id="taikhoan"  /></td>
    </tr>
    <tr>
      <td>Mật Khẩu</td>
      <td>
      <input type="password" name="matkhau" id="matkhau"  /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="button" id="button" value="Đăng Nhập" /></td>
    </tr>
  </table>
</form>
<?php
       
        
        include('../inc/myconnect.php');
        include('../inc/function.php');
        if($_SERVER['REQUEST_METHOD' ]=='POST');
        {
          $errors= array();
          if(empty($_POST['taikhoan']))
          {
            $errors[]='taikhoan';
          }
          else
          {
            $taikhoan=$_POST['taikhoan'];
          }
          if(empty($_POST['matkhau']))
          {
            $errors[]='matkhau';
          }
          else
          {
            $matkhau=md5($_POST['matkhau']);
            
          }
          $_SESSION['taikhoan']=$_POST['taikhoan'];
          if(empty($errors))
          {
            $query="SELECT id,taikhoan,matkhau,status FROM tbluser WHERE taikhoan='{$taikhoan}' AND matkhau='{$matkhau}' AND status='1'";
            $result = mysqli_query($dbc,$query);kt_query($result,$query);
            if(mysqli_num_rows($result)==1)
            {
              list($id,$taikhoan,$matkhau,$status)=mysqli_fetch_array($result,MYSQLI_NUM);
              $_SESSION['id']=$id;
              $_SESSION['taikhoan']=$_POST['taikhoan'];
              header('Location: quantri.php');
        
            }
            else
            {
              $message="tai khoan mat khau khong dung";
            }
            
            
          }
        }
?>
</body>
</html>