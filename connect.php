<?php
	$connect= mysqli_connect("localhost","u345307853_root","u345307853","u345307853_ts") or die("Không thể kết nối database");
    mysqli_select_db($connect,"u345307853_ts") or die("Không thể chọn database");
?>