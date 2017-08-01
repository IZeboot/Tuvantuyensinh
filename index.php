<?php
//Khai báo sử dụng session
session_start();
 
//Khai báo utf-8 để hiển thị được tiếng việt
header('Content-Type: text/html; charset=UTF-8');
	$dtz = new DateTimeZone("Asia/Ho_Chi_Minh");
	$now = new DateTime(date("Y-m-d H:i:s"), $dtz);
	$time =$now->format("Y-m-d H:i:s");
//Xử lý đăng nhập
if (isset($_POST['bt_insert_question'])) 
{
	
	include('connect.php');
	$name = addslashes($_POST['name_question']);
	$address = addslashes($_POST['address_question']);
	$email = addslashes($_POST['email_question']);
	$phone = addslashes($_POST['numphone_question']);
	$type = addslashes($_POST['type_question']);
	$question = addslashes($_POST['main_question']);
	$sql="INSERT INTO tb_question ( name_question, address_question, emai_question, phone_question, type_question, question, time_question) VALUES ('".$name."' ,'".$address."','".$email."','".$phone."','".$type."','".$question."','".$time."')";
	if(mysqli_query($connect, $sql)){
		echo '<script language="javascript">';
		echo 'alert("Câu hỏi của bạn đã được gửi đến tổ tư vấn!")';
		echo '</script>';
		$url=$_SERVER['REQUEST_URI'];
		header("Refresh: 1; URL=$url");
	}else{
		echo '<script language="javascript">';
		echo 'alert("Câu hỏi không gửi được hãy kiểm tra kết nối!")';
		echo '</script>';
		$url=$_SERVER['REQUEST_URI'];
		header("Refresh: 1; URL=$url");
		}
}

?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="lib/jquery.js"></script>
    <title>Trang tuyển sinh Đại hoc bách khoa Hà Nội</title>
    <link rel="stylesheet" href="lib/bootstrap.css" type="text/css" media="screen">
    <link rel="stylesheet" href="lib/style.css" type="text/css" media="screen">
    <script type="text/javascript" src="lib/totop.js"></script>
</head>
<body class="tuyensinh">
	<div class="totopshow">
    	<a href="#" class="back-to-top">
        <img alt="Lên đầu trang" src="images/gototop0.png">
        </a>
    </div>
    <div id="ttr_page" class="container">
        <nav id="ttr_menu" class="navbar-default navbar">
            <div id="ttr_menu_inner_in">
            	<div class="menuforegroud"></div>
                <div class="html_content">
                	<p>
                    	<a href="http://ts.hust.edu.vn">
                        	<img src="images/logo.png" alt="Tuyển sinh ĐHBK Hà Nội">
                        </a>
                    </p>
				</div>
			</div>
            <div id="navigationmenu">
            	<div class="navbar-header">
                    <button id="nav-expander" data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
					</button>
				</div>
			</div>
		</nav>
        <div class="ttr_banner_slideshow"></div>
        <div class="ttr_slideshow">
        	<div id="ttr_slideshow_inner">
            <ul>
                <li id="Slide0" class="ttr_slide" data-slideEffect="Fade">
                	<a href="#"></a>
                	<div class="ttr_slideshow_last">
                    	<div class="ttr_slideshowshape01" data-effect="None" data-begintime="0" data-duration="1" data-easing="linear" data-slide="None">
                        	<div class="html_content">
                            	<p style="margin:0.36em 0.36em 1.43em 0.36em;text-align:Center;">
                                	<span style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:3.429em; border:2px solid:#F00">Tuyển sinh đại học bách khoa Hà Nội</span>
                                </p>
                                <p>
                                	<span style="font-family:'PT Sans','Arial';font-size:2.571em;background-color:transparent;">Chú Thích Bla bla</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="Slide1" class="ttr_slide" data-slideEffect="Fade">
                    <a href="#"></a>
                    <div class="ttr_slideshow_last">
                        <div class="ttr_slideshowshape11" data-effect="None" data-begintime="0" data-duration="1" data-easing="linear" data-slide="None">
                            <div class="html_content">
                                <p style="margin:0.36em 0.36em 1.43em 0.36em;text-align:Center;">
                                    <span style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:3.429em;color:rgba(30,214,203,1);">Lượng đăng ký xét tuyển</span>
                                 </p>
                                 <p style="text-align:Center;line-height:2.11267605633803;">
                                    <span style="font-family:'PT Sans','Arial';font-size:1.143em;">Muốn gì phải nói </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <li id="Slide2" class="ttr_slide" data-slideEffect="Fade">
                    <a href="#"></a>
                    <div class="ttr_slideshow_last">
                        <div class="ttr_slideshowshape21" data-effect="None" data-begintime="0" data-duration="1" data-easing="linear" data-slide="None">
                            <div class="html_content">
                                <p style="text-align:Center;">
                                    <span style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:3.429em;color:rgba(30,214,203,1);">Nắng Bách Khoa</span>
                                </p>
                                <p style="text-align:Center;">
                                    <span style="font-family:'PT Sans','PT Sans';font-size:1.143em;">Hôm qua em đến trường, xe của em ngập nước ý a!!</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
			</ul>
        </div>
        <div class="ttr_slideshow_in">
			<div class="ttr_slideshow_last">
				<div id="nav"></div>
			</div>
		</div>
	</div> 
    <div class="ttr_banner_slideshow"></div>
    	<div id="ttr_content_and_sidebar_container">
		<div id="ttr_content">
			<div id="ttr_content_margin"class="container-fluid">
				<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
				<div class="ttr_Home_html_row0 row">
					<div class="post_column col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="ttr_Home_html_column00">
							<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
							<div class="html_content">
                				<p style="margin:0.14em 0em 1.43em 1.43em;text-align:Center;">
                    				<span style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:36px;color:#F00;">Top 20 câu hỏi hay nhất</span>
                    			</p>
							</div>
							<div class="Main_question_answer"style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                        </div>
						<div style="clear:both;"></div>
					</div>
                </div>
              <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block"></div>
		  </div>
				<div class="ttr_Home_html_row1 row">
                    <div class="post_column col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ttr_Home_html_column10">
                            <div class="html_content">
                                <p style="margin:0.36em 0.36em 1.43em 0.36em;text-align:Center;">
                                    <span style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:1.429em;color:#000;">TƯ VẤN </span>
                                    <span style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:1.429em;color:#F0F; border:2px solid:#666">- </span>
                                    <span style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:1.429em;color:#F00;">GIẢI ĐÁP</span>
                                </p>
                            </div>
                            <form method="post">
                            	<input class="check" required  placeholder="Họ và tên" type="text" name="name_question">
                                <input class="check" required placeholder="Địa chỉ" type="text" name="address_question">
                                <input class="check" required x-autocompletetype="email" placeholder="Địa chỉ Email" type="email" name="email_question">
                                <input class="check" required x-autocompletetype="phone-full" placeholder="Số điện thoại" type="tel" name="numphone_question">
                                <textarea class="check" placeholder="Tiêu đề câu hỏi" name="type_question"></textarea>
                                <textarea class="check" required placeholder="Câu hỏi" name="main_question"></textarea>
                                <button name="bt_insert_question">Gửi câu hỏi</button>
                                </form>
                        <div style="clear:both;"></div>
                    </div>
				</div>
				<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block"></div>
		</div>
		<div class="ttr_Home_html_row2 row">
			<div class="post_column col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ttr_Home_html_column20">
					<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
					<div class="html_content">
                    	<p style="margin:0.36em 0.36em 1.43em 0em;text-align:Center;">
                        	<span style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:36px;color:rgba(255,255,255,1);">Câu hỏi </span><span style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:36px;color:#F00;">mới</span>
						</p>
                        <p style="margin:0.14em 0em 0em 1.43em;text-align:Center;line-height:1.76056338028169;">
						</p>
                        <?php
		try{
			include'connect.php';
			$sql_select="SELECT * from tb_question ORDER BY id";
			$dl=mysqli_query($connect, $sql_select);
		}catch (PDOException $e){
			die("lỗi" . $e->getMessage());
			}
		while($row = mysqli_fetch_array($dl)):
			if(!empty($row['rep_question'])){
			?>
			<div class="manaquestion" style="border-width: 3px; border-style: solid; border-color:#676767;border-radius:5%; margin:10px 0 10px;">
				<div class="question" style=" margin:5px">
					<div class="time-question" style="color:#F00"><?php echo htmlspecialchars($row['time_question']) ?></div>
					<div class="main_question">
							<strong style="color:#F00">Bạn: </strong>
							<span class="name" style="color:#F00"><?php echo htmlspecialchars($row['name_question']) ?></span>
							<span class="address" style="color:#F00">(<?php echo htmlspecialchars($row['address_question']) ?>)</span>
							<span class="content" style="color:#CCC" ><?php echo htmlspecialchars($row['question']) ?></span>
					</div>
				</div>
				<div class="answer" id="ans" style="margin:10px; display:none">
					<div class="main_answer">
						<span class="start" style="color:#F00"><strong>Trả lời: </strong></span>
						<p><span class="content" style="color:#CCC"><?php echo htmlspecialchars($row['rep_question']) ?></span></p>
						<span class="answer-user-name" style="color:#F00">(<?php echo htmlspecialchars($row['name_rep_question']) ?>)</span>
					</div>
				</div>
			
				<div id="bt" style="color:#fff; text-align:center">Hiện phần trả lời</div>
				
			</div>
			<script>
			document.getElementById("bt").id="h_an<?php echo $row['id']?>";
			document.getElementById("ans").id="b_an<?php echo $row['id']?>";
			$('#h_an<?php echo $row['id']?>').click(function(){
				$('#b_an<?php echo $row['id']?>').toggle('slow');
				$(this).toggleClass('green');
				});
			</script>
			<?php } endwhile; ?>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
		<script src="lib/show_question.js"></script>
        <div class="about"></div>
    </div>
					</div>
					<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
					<div style="clear:both;"></div>
				</div>
			</div>
			<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block"></div>
		</div>
		<div class="ttr_Home_html_row3 row">
			<div class="post_column col-lg-6 col-md-12 col-sm-12 col-xs-12">
				<div class="ttr_Home_html_column30">
					<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
					<div class="html_content">
                    	<p>
                            	<span>
                            		<img src="images/bk2017.jpg" style="max-width:521px;max-height:420px;" />
								</span>
						</p>
					</div>
					<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
					<div style="clear:both;"></div>
				</div>
			</div>
            <div class="clearfix visible-sm-block visible-md-block visible-xs-block"></div>
            <div class="post_column col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="ttr_Home_html_column31">
                    <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                    <div class="html_content">
                        <p style="margin:0.14em 0em 0em 1.43em;line-height:1.47042253521127;">
                            <br style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-size:1.286em;" />
                        </p>
                        <p style="margin:0.14em 0em 0em 1.43em;line-height:1.47042253521127;">
                            <br style="font-family::Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-size:1.286em;" />
                        </p>
                        <p style="margin:0.14em 0em 0em 1.43em;line-height:1.47042253521127;">
                            <br style="font-family::Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:1.429em;" />
                        </p>
                        <p style="margin:0.14em 0em 0em 1.43em;line-height:1.47042253521127;">
                            <br style="font-family::Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:1.429em;" />
                        </p>
                        <p style="margin:0.14em 0em 0em 1.43em;line-height:1.47042253521127;">
                            <span style="font-family::Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:1.429em;color:#F00;">Trường Đại học Bách Khoa Hà Nội - Hanoi University of Science and Technology (HUST)</span>
                        </p>
                        <p style="margin:0.14em 0em 0em 1.43em;line-height:1.76056338028169;">
                            <span style="font-family:'PT Sans','Arial';color:rgba(52,52,52,1);">Thành lập năm 1956, Trường Đại học Bách Khoa Hà Nội là trường Đại học kỹ thuật đầu tiên và luôn luôn là trường đại học kỹ thuật hàng đầu của Việt Nam. Với truyền thống gần 60 năm xây dựng và phát triển, Trường Đại học Bách Khoa Hà Nội luôn năng động, sáng tạo trong đào tạo, nghiên cứu khoa học và có những đóng góp đáng kể vào sự nghiệp công nghiệp hóa, hiện đại hóa của đất nước.</span>
                        </p>
                        <p style="margin:0.14em 0em 0em 1.43em;line-height:1.47042253521127;">&nbsp;</p>
                        <p style="margin:0.14em 0em 0em 1.43em;line-height:1.47042253521127;">
                            <span>
                                <a HREF="#" target="_self" class="btn btn-lg btn-primary">Đọc tiếp ></a>
                            </span>
                        </p>
                    </div>
                    <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                    <div style="clear:both;"></div>
                </div>
            </div>
			<div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block"></div>
		</div>
            <div class="ttr_Home_html_row5 row">
                <div class="post_column col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="ttr_Home_html_column50">
                        <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                        <div class="html_content">
                            <p style="margin:0.36em 0.36em 1.43em 0.36em;text-align:Center;">
                                <span style="font-family:Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:1.429em;color:rgba(40,54,61,1);">Danh mục</span>
                            </p>
                            
                        </div>
                        <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                        <div style="clear:both;"></div>
                    </div>
                </div>
                <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block"></div>
            </div>
            <div class="ttr_Home_html_row6 row">
                <div class="post_column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="ttr_Home_html_column60">
                        <div class="html_content">
                        	<img src="images/101.jpg" width="431" height="382" class="ttr_fill" style="max-width:450px;max-height:250px;" />
                        </div>
                    </div>
                </div>
                <div class="post_column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                    <div class="ttr_Home_html_column61">
                            <div class="html_content">
                                	<img src="images/102.jpg" class="ttr_fill" style="max-width:450px;max-height:250px;" />
                            </div>
                    </div>
                 </div>
                <div class="post_column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                	<div class="ttr_Home_html_column62">
                            <div class="html_content">
                            <img src="images/103.jpg" class="ttr_fill" style="max-width:450px;max-height:250px;" />
                            </div>
                    </div>
                </div>
                <div class="post_column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                	<div class="ttr_Home_html_column63">
                    	<div class="html_content">
                             	<img src="images/104.jpg" class="ttr_fill" style="max-width:450px;max-height:250px;" />
                        </div>
                    </div>
                </div>
                <div class="post_column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="ttr_Home_html_column64">
                            <div class="html_content">
                            	<img src="images/105.jpg" class="ttr_fill" style="max-width:450px;max-height:250px;" />
                                    
                            </div>
                        </div>
                </div>
                <div class="post_column col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="ttr_Home_html_column65">
                            <div class="html_content">
                            	<img src="images/106.jpg" class="ttr_fill" style="max-width:450px;max-height:250px;" />
                            </div>
                        </div>
                </div>
            </div>
                <div class="ttr_Home_html_row7 row">
                    <div class="post_column col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="ttr_Home_html_column70">
                            <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                            <div class="html_content">
                                <p style="margin:0.36em 0.36em 0.36em 0em;text-align:Center;">
                                    <span style="font-family::Cambria, 'Hoefler Text', 'Liberation Serif', Times, 'Times New Roman', serif;font-weight:700;font-size:16px;color:#FFF;">Theo dõi trang fanpage để nhận được thông tin mới nhất</span>
                                </p>
                                <p style="text-align:Center;">
                                    <br />
                                </p>
                                <p style="text-align:Center;">
                                    <span>
                                        <a HREF="#" target="_self" class="btn btn-md btn-default">Theo dõi</a>
                                    </span>
                                </p>
                            </div>
                            <div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                    <div class="clearfix visible-lg-block visible-sm-block visible-md-block visible-xs-block"></div>
                </div>
				<div style="height:0px;width:0px;overflow:hidden;-webkit-margin-top-collapse: separate;"></div>
			</div>
		</div>
		<div style="clear:both"></div>
	</div>
	<div style="height:0px;width:0px;overflow:hidden;"></div>
    <script>
		var myIndex = 0;
		carousel();
		
		function carousel() {
			var i;
			var x = document.getElementsByClassName("ttr_slide");
			for (i = 0; i < x.length; i++) {
			   x[i].style.display = "none";
			}
			myIndex++;
			if (myIndex > x.length) {myIndex = 1}    
			x[myIndex-1].style.display = "block";  
			setTimeout(carousel, 3500);    
			}
 	</script>
</body
></html>