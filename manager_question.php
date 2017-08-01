<?php
$dtz = new DateTimeZone("Asia/Ho_Chi_Minh");
$date_now = new DateTime(date("Y-m-d"), $dtz);
$time_now = new DateTime(date("H:i:s"), $dtz);
$date_select =$date_now->format("Y-m-d");
$time_select =$time_now->format("H:i:s");
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
//Xử lý đăng nhập
if (isset($_POST['bt_insert_question'])) 
{
	include('connect.php');
	$sql = mysql_query("SELECT * FROM tb_question ORDER BY id");
	if(mysqli_query($connect, $sql)){
		echo"thêm dữ liệu thành công";
	}else{
		echo "lỗi Error: " . $sql . "<br>";
		}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="lib/jquery.js"></script>
<script type="text/javascript" src="lib/totop.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<link rel="stylesheet" href="lib/style_question.css" type="text/css" media="screen">
<title>Untitled Document</title>
</head>

<body style="background:#CCC;">
	<div class="totopshow">
    	<a href="#" class="back-to-top">
        <img alt="Lên đầu trang" src="images/gototop0.png">
        </a>
    </div>
    
	<div id="ttrpage1" >
        <a href="http://ts.hust.edu.vn">
        	<img src="images/logo.png" alt="Tuyển sinh ĐHBK Hà Nội"></a>
        <div id="mana_question" style=" text-align:center;">
        	<table border="1px" style="width:100%">
                    <tr bgcolor="#CC3300" style="color:#FFFFFF; font-weight:bold">
                        <td style="width:10%">Bạn: </td>
                        <td style="width:10%">Điện Thoại</td>
                        <td style="width:10%">Email</td>
                        <td style="width:10%">Địa Chỉ</td>
                        <td style="width:60%">Câu Hỏi</td>
                	</tr>
                </table>
            <form name="answer_1" method="post">
				<?php		
                try{
                include'connect.php';
                $sql_select="SELECT * from tb_question ORDER BY id";
                $dl=mysqli_query($connect, $sql_select);
                }	
                catch (PDOException $e){
                die("lỗi" . $e->getMessage());
                }
				while($row = mysqli_fetch_array($dl))
                    { 	
					if(empty($row['rep_question'])){
                        $mangID[]=$row['id'];
                        ?>
                        <table border="1px">
                            <tr id="main_question" style=" color:#333; width:100%">
                                <td style="width:10%"><?php echo htmlspecialchars($row['name_question']) ?></td>
                                <td style="width:10%"><?php echo htmlspecialchars($row['phone_question']) ?></td>
                                <td style="width:10%"><?php echo htmlspecialchars($row['emai_question']) ?></td>
                                <td style="width:10%"><?php echo htmlspecialchars($row['address_question']) ?></td>
                                <td id="main_<?php echo htmlspecialchars($row['id']) ?>" style="width:50%"><?php echo htmlspecialchars($row['question']) ?></td>
                                <td style="width:10%"><a href="manager_question.php?ID=<?php echo htmlspecialchars($row['id']) ?>" >Xóa</a></td>
                            </tr>
                        </table>
                        <textarea name="name_answer<?php echo htmlspecialchars($row['id']) ?>" id="answer_<?php echo htmlspecialchars($row['id']) ?>" bgcolor="#CC3300" style="width:100%; height:100px; display:none; font-weight:bold" placeholder="Phần trả lời"></textarea>
                        <script>
                        $('#main_<?php echo $row['id']?>').click(function(){
                            $('#answer_<?php echo $row['id']?>').toggle('slow');
                            $(this).toggleClass('green');
                            });
                        </script>
                    <?php 
					}
					else{
						echo 'Không có câu hỏi trong dữ liệu'; 
						?>
						<script language="javascript">
                            $('#button_sub').css("display","none");
                        </script>
                    <?php
					}
                 }
                ?>		
                <div id="from_success">
                    <label id="time_math1">Chọn thời gian public</label>
                    <input id="time_math2" type="datetime-local" name="bday" min=<?php echo $date_select."T".$time_select ?> >
                    <label id="time_math3">Vào lúc: </label>
                    <label id="time_math4"></label>
                    <label id="time_math5">câu trả lời sẽ được public lên trang web</label>
                    <?php echo "ngày " .$date_select. "giờ" .$time_select; ?>
                    <button name="button_answer" value="1">Lưu</button>
              </div>
            </form>
            
            <button id="button_sub" name="button_answer">Hoàn thành trả lời</button>
        </div>
        
          <script>
		  		$s=0;
		  		$('#button_sub').click(function(){
					if($s==0){ 
						$(this).text('Quay lại');
						$('#from_success').css("display","block");
						$s=1;}
					else{
						$(this).text('Hoàn thành trả lời');
						$('#from_success').css("display","none");
						$s=0;}
					});
          </script>
          <?php 
					if(!empty($_POST['button_answer'])){
						for($i=0;$i<count($mangID);$i++)
						{
							$ls= "name_answer".$mangID[$i];
							if(empty($_POST[$ls])){
								echo "công chứ ngủ tỏng rừng";
							}else{
								try{
									include'connect.php';
									$sqli_update="UPDATE tb_question SET rep_question='".$_POST[$ls]."' WHERE id='".$mangID[$i]."'";
									echo $sqli_update;
									if(mysqli_query($connect, $sqli_update)){
										echo 'thành công';
									}
									else{
										echo 'thất bại toàn tập' .mysqli_fetch_array($sql_update);
									}
								}
								catch(PDOException $e){
										die("lỗi" . $e->getMessage());
									}
							}
						}
					}
					if(isset($_REQUEST['ID'])){
						try{
							include'connect.php';
							$sqli_del="DELETE FROM tb_question WHERE id='".$_REQUEST['ID']."'";
							if(mysqli_query($connect,$sqli_del)){
								echo 'thành công';
							}else{
								echo 'thất bại nặng nề';
								}
						}
						catch(PDOException $e){
							die("lỗi" . $e->getMessage());
							}
						}
			  ?>
</body>
</html>