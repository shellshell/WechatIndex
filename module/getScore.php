<?php
	require('./getCookie.php');	
	
	function getScore($user_id=false,$password=false,$trans=1){
		/*
		*	Doc: 成绩查询功能,查询条件 ：cookie文件存在与cookie文件夹
		*	@user_id,@password 参数必须
		* 	@trans 为1返回成绩，其他返回课程名
		* 
		 */
		
		if (!$user_id or !$password){
			echo "请先登录！";
			exit();
		}
		//引入获取cookie方法
		

		$vCookie = getCookie($user_id,$password = "qweqweqwe");
		$cookie =$vCookie."user_id=".$user_id.";user_type=student;user_style=modern;language=cn;";
		$referter = 'http://210.41.95.5/service/login.jsp?user_type=student';
		$url = "http://210.41.95.5:80//servlet/CheckStudentSubmitAppraiseAction";
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

		
		// 匹配成绩
		preg_match_all("/font-size:13px;>(.*?)<\/font>/s",$body,$score);
		$score = $score[1];
		// 匹配课程名称
		preg_match_all("/id=\"pageBodyRight\">(.*?)<\/div>/s",$body,$table);
		// [\x{4e00}-\x{9fa5}] 匹配中文
		preg_match_all("/[\d]{7}<\/td>\r\n(.*?)<\/td>/su",$body,$courseArry);
		for ($i=0; $i < count($courseArry[1]); $i++) { 
			preg_match_all("/[\x{4e00}-\x{9fa5}]{2,}/su",$courseArry[1][$i],$courseTem[$i]);
		}
		
		for ($i=0; $i < count($courseTem); $i++) { 
			$course[$i] = $courseTem[$i][0][0];
		}
		if ($trans) {
			return $score;
		}else{
			return $course;
		}
		
		
	}
	
	
 ?>
 