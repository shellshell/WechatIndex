<?php
	function getMakeUp($user_id = false){
		/**
		 * 获取补考表，以二位数组的形式返回
		 */
		if (!$user_id) {
			exit('请登录！');
		}
		require('./getCookie.php');
		$vCookie = getCookie($user_id,$password = '19940313');
		$cookie =$vCookie.'user_id='.$user_id.';user_type=student;user_style=modern;language=cn;';
		$referter = 'http://210.41.95.5/service/login.jsp?user_type=student';
		$url = 'http://210.41.95.5/student/test/MyTestMakeup.jsp';
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

		preg_match_all("/align=\"center\">\r\n(.*?)<\/td>/s",$body, $matches);
		$makeUp = $matches[1];
		// 获取总共的补考课目数
		$number = count($makeUp)/6;
		if ($number == 0) {
			return 0;
		}
		// 初始化数组偏移量
		$couseSum = 2;
		$testTimeSum = 4;
		$placeSum = 5;
		// 分别获取课程名、考试时间、地点
		for ($i = 0; $i < $number; $i++) { 
			$couse[$i] = $makeUp[$couseSum];
			$testTime[$i] = trim($makeUp[$testTimeSum]);
			$place[$i] = trim($makeUp[$placeSum]);
			$couseSum += 6;
			$testTimeSum += 6;
			$placeSum += 6;
		}
		// 拼接成数组返回
		$makeUp = array();
		$makeUp[0] = $couse;
		$makeUp[1] = $testTime;
		$makeUp[2] = $place;
		return $makeUp;

	}
	

 ?>