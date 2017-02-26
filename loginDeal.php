<?php
	
	$user_id = $_POST['user_id'];
	$password = $_POST['password'];
	$ranstring = $_POST['ranstring'];
	$vCookie = $_POST['vCookie'];
	
	//在服务器上存储session
	$url = "http://210.41.95.5/servlet/UserLoginSQLAction";
	$post = 'url=..%2Fservlet%2FUserLoginCheckInfoAction&OperatingSystem=&Browser=&user_id='.$user_id.'&password='.$password.'&ranstring='.$ranstring.'&user_type=student&btn1=';
	$referter = 'http://210.41.95.5/service/login.jsp?user_type=student';
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_REFERER, $referter);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9.1.5) Gecko/20091102 Firefox/3.5.5');//模拟浏览器
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

	if (empty($flag)) {
		echo "登录失败！";
		exit();
	}
	$name = $id[1][1];
	session_start();
	echo "欢迎你 <b>" . $name . "</b>";
	$f = fopen('./cookie/' . $user_id . '.txt', 'w');
	fwrite($f,$vCookie);
	fclose($f);
	
	$_SESSION['name'] = $name;
	echo "
	<script>
	location.href = \"./indexEmei.php\"
	</script>
	";

 ?>