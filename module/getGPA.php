<?php
	require('./getCookie.php');

	$user_id = '2014121847';
	$vCookie = getCookie($user_id,$password = '19940313');
	$cookie =$vCookie."user_id=".$user_id.";user_type=student;user_style=modern;language=cn;";
	$referter = 'http://210.41.95.5/servlet/StudentScorePointAction';
	$url = "http://210.41.95.5/student/score/MyScorePoint.jsp";
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_REFERER, $referter);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5');//模拟浏览器
	curl_setopt($ch,CURLOPT_HEADER,0);
	curl_setopt($ch,CURLOPT_COOKIE,$vCookie);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	$body = curl_exec($ch);	
	curl_close($ch);
	echo $body; 
 ?>