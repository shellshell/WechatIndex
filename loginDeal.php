<?php
	// 接受post过来的数组
	$user_id = $_POST['user_id'];
	$password = $_POST['password'];
	$ranstring = $_POST['ranstring'];
	$vCookie = $_POST['vCookie'];
	
	//在教务服务器上登录 获取访问许可
	$url = "http://210.41.95.5/servlet/UserLoginSQLAction";
	$post = 'url=..%2Fservlet%2FUserLoginCheckInfoAction&OperatingSystem=&Browser=&user_id='.$user_id.'&password='.$password.'&ranstring='.$ranstring.'&user_type=student&btn1=';
	$referter = 'http://210.41.95.5/service/login.jsp?user_type=student';
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_REFERER, $referter);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5');
	curl_setopt($ch,CURLOPT_POST,1);
	curl_setopt($ch,CURLOPT_HEADER,0);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$post);
	curl_setopt($ch,CURLOPT_COOKIE,$vCookie);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	$html = curl_exec($ch);
	curl_close($ch);

	//第二次访问
	$url = "http://210.41.95.5/servlet/StudentInfoMapAction?MapID=101&PageUrl=../student/student/student.jsp";
	$referter = 'http://210.41.95.5/service/login.jsp?user_type=student';
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

	preg_match_all('/bgcolor="#ffffff">&nbsp;(.*?)<\/td>/U',$body,$id);
	@$flag = $id[1][0];
	// 登录失败处理
	if (empty($flag)) {
		echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">';
		echo '<center><h2>登录失败！(⊙︿⊙)</h2><center>';
		echo "<script>
		setTimeout(function(){
		location.href = \"./login.php\";
		},2000);</script>";
		exit();
	}
	// 得到正则的姓名、专业
	$name = $id[1][1];
	$major = $id[1][8];
	// 将cookie存储在cookie文件夹
	$f = fopen('./cookie/' . $user_id . '.txt', 'w');
	fwrite($f,$vCookie);
	fclose($f);
	// 将关键信息存储在session中
	session_start();
	$_SESSION['name'] = $name;
	$_SESSION['user_id'] = $user_id;
	$_SESSION['major'] = $major;
	// 跳转到登录后主页
	echo "<script>location.href = \"./indexEmei.php\"</script>";


 ?>