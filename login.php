<?php
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
 
//Xử lý đăng nhập
if (isset($_POST['dangnhap'])) 
{
	include('connect.php');
     
    //Lấy dữ liệu nhập vào
    $username = addslashes($_POST['txtUsername']);
    $password = addslashes($_POST['txtPassword']);
     
    //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
    if (!$username || !$password) {
		echo '<script language="javascript">';
		echo 'alert("Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu")';
		echo '</script>';
		$url=$_SERVER['REQUEST_URI'];
  		header("Refresh: 1; URL=$url");
    }else{
		// mã hóa pasword
		$password = md5($password);
		 
		//Kiểm tra tên đăng nhập có tồn tại không
		$query = mysqli_query($connect, "SELECT * FROM tb_user WHERE username='".$username."'");
		if (mysqli_num_rows($query) == 0) {
			echo '<script language="javascript">';
			echo 'alert("Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại.")';
			echo '</script>';
			$url=$_SERVER['REQUEST_URI'];
			header("Refresh: 1; URL=$url");
		} else{
			//Lấy mật khẩu trong database ra
			$row = mysqli_fetch_array($query);     
			//So sánh 2 mật khẩu có trùng khớp hay không
			if ($password != $row['password']) {
				echo '<script language="javascript">';
				echo 'alert("Tên đăng nhập không đúng hoặc mật khẩu sai")';
				echo '</script>';
				$url=$_SERVER['REQUEST_URI'];
				header("Refresh: 1; URL=$url");
			}else{
				$_SESSION['username'] = $username;
				echo "Xin chào " . $username . ". Bạn đã đăng nhập thành công. <a href='/'>Về trang chủ</a>";
				die();
				}
		}
	}
}
?>
<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" href="lib/style_login.css" type="text/css" media="screen">
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
    	<div class="logo">
        	<a href="index.php"><img width="365px" src="images/logo.png" alt="Tuyển sinh ĐHBK Hà Nội" ></a>
    </div>
    	<div class="Text">
        	<p style="margin:auto;text-align:Center;">
            	<span style="font-family:'Roboto', sans-serif;font-weight:700;font-size: 36px;color:#FFF;">Đăng nhập hệ thống</span>
            </p>
        </div>
        
    <div class="login-page">
        
        	<div class="form">
                <form class="login-form" action='login.php?do=login' method='POST'>
                	<input type="text" placeholder="username" name='txtUsername'/>
                    <input type="password" placeholder="password" name='txtPassword'/>
                    <button type='submit' name="dangnhap" value='Đăng nhập'>login</button>
                </form>
                <a id="showmes" href="#">Bạn Quên mật khẩu?</a>
                <div class="mesdialog">
           <span style="font-family:'Roboto', sans-serif;font-weight:700;font-size: 14px;color:#4CAF50;">Vui lòng liên hệ quản trị website!</span>

            </div>
            </div>
        </div>
        
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="lib/jsshow.js"></script>
</body>
</html>