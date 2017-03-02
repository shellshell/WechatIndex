<?php 
	function getCookie($stu_id=false,$password=false){
		/**
		 * 获取cookie
		 * 读取储存在cookie目录中的cookie
		 */
		if (!$stu_id or !$password) {
			exit('请先登录！');
		}
		$path='./cookie/'.$stu_id.'.txt';
		$f = fopen($path,'r');
		$cookie=fread($f,filesize($path));
		fclose($f);
		return $cookie;
	} 	
	function getPersonImg(){
		/**
		 * 获取个人头像并储存在personImg文件下
		 */
		session_start();
		$user_id = $_SESSION['user_id'];
		$vCookie = getCookie($user_id = $user_id,$password = '19940313');
		$cookie =$vCookie."user_id=".$user_id.";user_type=student;user_style=modern;language=cn;";
		$referter = 'http://210.41.95.5/service/login.jsp?user_type=student';
		$url = "http://210.41.95.5:80//servlet/StudentPhotoView?UserName=".$user_id;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_REFERER, $referter);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5');//模拟浏览器
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch,CURLOPT_COOKIE,$vCookie);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		$body = curl_exec($ch);
		if (empty($body)) {
				header('refresh:3;url="./login.php"');
				exit('<center><h2>请先登录！</h2></center>');

			}	
		curl_close($ch);
		$f=fopen('./personImg/'.$user_id.'.jpg','w');
		fwrite($f,$body);
		fclose($f);
	} 	
 ?>


<?php
	getPersonImg(); 
	$name = $_SESSION['name'];
	$user_id = $_SESSION['user_id'];
	$major = $_SESSION['major'];
 ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
	<link rel="stylesheet" href="./css/bootstrap.min.css" />
	<title>教务主页</title>
	<style>
		.menuBlock{
			text-align: center;
			color: #fff;
			background-color: #666;
			padding: 25px;
			width: 90%;
			margin-left: auto;
			margin-right: auto;
			margin-bottom: 20px;
		}
	</style>
</head>

<body>
<!-- 个人信息栏 -->
<div class="container container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-responsive table-bordered table-condensed" >
				 	<tr align="center">
				 		<td rowspan="3" align="center">
				 			<img src=<?php echo '"./personImg/'.$user_id.'.jpg"' ?>  alt="个人头像" width="100%" />
				 		</td>
				 		<td style="vertical-align:middle;"><?php echo $name; ?></td>
				 	</tr>
				 	<tr align="center">
				 		<td style="vertical-align:middle;"><?php echo $user_id ?></td>
				 	</tr>
				 	<tr align="center">
				 		<td style="vertical-align:middle;"><?php echo $major; ?></td>
				 	</tr>
			</table>
		</div>
	</div>
</div>

 <!-- 菜单栏 -->
<div class="container container-fluid">
	<div class="row">
		<div class="col-sm-12 menuBlock btn btn-block" id="0_block" onclick="jumpFun(this)">
			<span class="glyphicon glyphicon-check"></span> 成绩查询
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 menuBlock btn btn-block" id="1_block" onclick="jumpFun(this)">
			<span class="glyphicon glyphicon-calendar"></span> 课表查询
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 menuBlock btn btn-block" id="2_block" onclick="jumpFun(this)">
			<span class="glyphicon glyphicon-home"></span> 空闲教室
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 menuBlock btn btn-block" id="3_block" onclick="jumpFun(this)">
			<span class="glyphicon glyphicon-pencil"></span> 补考安排
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 menuBlock btn btn-block" id="4_block" onclick="jumpFun(this)">
			<span class="glyphicon glyphicon-pencil"></span> 期末安排
		</div>
	</div>
</div>

<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/hrefIndex.js"></script>		
</body>
</html>