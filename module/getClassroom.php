<?php
function getClassroom($num){
	/**
	 * 抓取空闲教室信息
	 * @num == 1 返回教室号否则返回空闲节次
	 */
	$url = "http://210.41.95.5/public/ClassQuery.jsp?";
	$get = "PageAction=Query&day_time_text=1111111111111&school_area_code=2&building=&week_no=1&day_no=4&day_time1=ON&day_time2=ON&day_time3=ON&day_time4=ON&day_time5=ON&day_time6=ON&day_time7=ON&day_time8=ON&day_time9=ON&day_time10=ON&day_time11=ON&day_time12=ON&day_time13=ON&B1=%E6%9F%A5%E8%AF%A2";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url.$get);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	$body = curl_exec($ch);
	curl_close($ch);
	preg_match_all("/<font color=\"#0000FF\">(.*?)<\/font>/",$body,$matches1);
	preg_match_all("/第(.*?)节/",$body,$matches2);
	// 将取到的教师号保存在变量$classNum中
	$classNum = array_slice($matches1[1],1);
	$classNode = array_slice($matches2[1],1);
	if ($num == 1) {
		return $classNum;
	}else{
		return $classNode;
	}
} 
	
 ?>

