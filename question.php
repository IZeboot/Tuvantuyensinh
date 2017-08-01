<?php
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if (isset($_GET['bt_insert_question'])) 
{
	include('lib/connect.php');
	$name = addslashes($_GET['name_question']);
	$address = addslashes($_GET['address_question']);
	$email = addslashes($_GET['address_question']);
	$phone = addslashes($_GET['numphone_question']);
	$type = addslashes($_GET['type_question']);
	$question = addslashes($_GET['main_question']);
	$sql="INSERT INTO tb_question ( name_question, address_question, emai_question, phone_question, type_question, question) VALUES ('".$name."' ,'".$address."','".$email."','".$phone."','".$type."','".$question."')";
	if(mysqli_query($connect, $sql)){
		echo '<script language="javascript">';
		echo 'alert("kho lỗi ")';
		echo '</script>';
	}else{
		echo '<script language="javascript">';
		echo 'alert("lỗi")';
		echo '</script>';
		}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="lib/question.css" type="text/css" media="screen">
<title>Untitled Document</title>
</head>

<body>
<div class="body">
	<form style="vertical-align: middle;; text-align: center"action="" method="get">
        <input class="check" placeholder="Họ và tên" type="text" name="name_question">
        <input class="check" placeholder="Địa chỉ" type="text" name="address_question">
        <input class="check" x-autocompletetype="email" placeholder="Địa chỉ Email" type="email" name="email_question">
        <input class="check" x-autocompletetype="number" placeholder="Số điện thoại" type="tel" name="numphone_question">
        <textarea class="check" placeholder="Tiêu đề câu hỏi" name="type_question"></textarea>
        <textarea class="check" placeholder="Câu hỏi" name="main_question"></textarea><button name="bt_insert_question">Gửi câu hỏi</button>
	</form>
    </div>
</body>
</html>