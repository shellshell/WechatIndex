$(document).ready(function($) {
	changeBlockColor();
});

// 菜单跳转函数
function jumpFun($block){
	var idDisplay = $block.id;
	var id = idDisplay.substr(0,1);
	console.log(id);
	var locaHref = '';
	var idHidden='';
	console.log(id);
	switch (id){
		case "0":
		locaHref = './module/score.php';
		break;
		case "1":
		locaHref = './module/timeTable.php';
		break;
		case "2":
		locaHref = './module/classroom.php';
		break;
		case "3":
		locaHref = './module/makeUp.php';
		break;
		case "4":
		locaHref = './module/testPlan.php';
		break;
		default:
		locaHref = './404/404.html';
	}
	for (var i = 0; i < $(".menuBlock").length; i++) {
		idHidden=i+"_block";
		if (idHidden == idDisplay){
			continue;
		}else{
			$("#"+idHidden).hide('slow/400/fast', function() {
				location.href = locaHref;
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
