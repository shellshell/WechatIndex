<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>教务主页</title>
	<style>
		.menuBlock{
			text-align: center;
			color: #fff;
			background-color: #666;
			padding: 25px;
			margin:20px;
		}
	</style>
</head>

<body>
<?php 
	echo $name = $_SESSION['name'];
 ?>
<div class="container">
	<div class="row">
		<div class="col-md-3 menuBlock" id="0_block" onclick="jumpFun(this)">成绩查询</div>
		<div class="col-md-3 menuBlock" id="1_block" onclick="jumpFun(this)">课表查询</div>
		<div class="col-md-3 menuBlock" id="2_block" onclick="jumpFun(this)">空闲教室</div>
		<div class="col-md-3 menuBlock" id="3_block" onclick="jumpFun(this)">考试安排</div>
	</div>
</div>




<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script>
	$(document).ready(function($) {
		changeBlockColor();
		setInterval("changeBlockColor()",10000);
	});
	function jumpFun($block){
		var idDisplay = $block.id;
		var idHidden='';
		for (var i = 0; i < $(".menuBlock").length; i++) {
			idHidden=i+"_block";
			if (idHidden == idDisplay){
				continue;
			}else{
				$("#"+idHidden).hide('slow/400/fast', function() {
					
					location.href="./score.php";

					
				});
			}
			
		}
	}

	function changeBlockColor(){
		// 改变每个块颜色
		// 依赖getRandomColor函数
		var i = 0;
		var id = "#" + i + "_block";
		var menuBlock = $(".menuBlock");
		for (var i = 0; i < menuBlock.length; i++) {
			color=Math.random();
			id="#" + i + "_block";
			$(id).css({"background-color":getRandomColor()});
		}
	}
	function getRandomColor() {
		// 函数：生成随机颜色值
		var c = '#'; 
		var cArray = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F']; 
		for(var i = 0; i < 6;i++) { 
			var cIndex = Math.round(Math.random()*15); 
			c += cArray[cIndex]; 
		} 
		return c; 
	} 

</script>		
</body>
</html>