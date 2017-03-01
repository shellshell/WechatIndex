<?php
	function getCookie($stu_id=false,$password=false){
		// 获取cookie
		// 读取储存在cookie目录中的cookie
		if (!$stu_id or !$password) {
			exit('请先登录！');
		}
		$path='../cookie/'.$stu_id.'.txt';
		$f = fopen($path,'r');
		$cookie=fread($f,filesize($path));
		fclose($f);
		return $cookie;
	} 	
	

?>