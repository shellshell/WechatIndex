<!-- 头 -->
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>微信教务 | CTAA</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/bootstrap.min.css" />
	<style>
		body{
					}
		#bigTitle{
			margin-top: 10px;
		}
		/*#emei{
			margin-left: 10px;
		}
		#xipu{
			margin-left: 50px;
		}*/
	</style>
</head>
<body >
<!-- 幻灯片 -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="./img/bg3.jpg" alt="...">
      <div class="carousel-caption">
        名山电影场
      </div>
    </div>
    <div class="item">
      <img src="./img/bg2.jpg" alt="...">
      <div class="carousel-caption">
        中山梁教学区
      </div>
    </div>
    <div class="item">
      <img src="./img/bg1.jpg" alt="...">
      <div class="carousel-caption">
        忠字门
      </div>
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		



<div class="container">
	<div class="jumbotron" id="bigTitle" >
	  <h1>欢迎访问微信教务!</h1>
	  <p>&nbsp;</p>
	  <p>
				 <a id="emei" class="btn btn-primary btn-lg btn-block" href="./login.php" role="button"> 峨 眉 </a>

				<a id="xipu" class="btn btn-primary btn-lg btn-block" href="http://202.115.67.50/service/login.jsp?user_type=student" role="button" > 犀 浦 </a> 
	  </p>
	
	</div>
</div>
<footer><center><small>&copy;<?php echo date('Y'); ?> 计算机科技与应用协会</small></center></footer>






<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>	
</body>
</html>

