<?php
	require('./getCookie.php');

	function getTimeTable($stu_id=false){
		if (!$stu_id) {
			exit('请先登录！');
		}
		 
		$vCookie = getCookie($user_id = $stu_id,$password = '19940313');
		$cookie =$vCookie."user_id=".$user_id.";user_type=student;user_style=modern;language=cn;";
		$referter = 'http://210.41.95.5/service/login.jsp?user_type=student';
		$url = "http://210.41.95.5/student/course/printCourse.jsp";
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_REFERER, $referter);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5');//模拟浏览器
		curl_setopt($ch,CURLOPT_HEADER,0);
		curl_setopt($ch,CURLOPT_COOKIE,$vCookie);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		$body = curl_exec($ch);	
		curl_close($ch);
		preg_match_all("/<table border=\"1\" width=\"100%\"(.*?)<\/table>/sU", $body,$table);
		$timeTable=$table[0][0];
		return $timeTable;

	}
		
 ?>
 