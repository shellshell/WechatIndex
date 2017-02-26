<?php
	function getImg(){
		$url = 'http://210.41.95.5/servlet/GetRandomNumberToJPEG?test=';
		$url = $url.time();
		//echo $url;
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//文件流返回
		$html=curl_exec($ch);
		curl_close($ch);
		// 匹配img文件
		preg_match_all('/\r\n\r\n(.*?)/sU', $html, $img);
		// 匹配cookie
		preg_match_all('/^Set-Cookie:\s*([^\n]*)/mi', $html, $matches);
		$vCookie=$matches[1][0];
		$vCookie=$vCookie.';';
		$f=fopen('./codeImg/tem.jpg',"w");
		fwrite($f, $img[1][0]);
		fclose($f);
		return $vCookie;
	}	
 ?>

