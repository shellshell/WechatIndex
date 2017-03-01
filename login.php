<?php   
  require('./module/getImg.php');
  $vCookie = getImg();

 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="x5-fullscreen" content="true">
<meta name="x5-page-mode" content="app">
<meta content="width=device-width, initial-scale=0.8, maximum-scale=1.0, user-scalable=0" name="viewport">
<title>教务登录</title>
<meta name="author" content="Xiongxiaofei" />
<link rel="stylesheet" type="text/css" href="css/style.css"  />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="./js/jquery.min.js"></script>
<script src="js/verificationNumbers.js" ></script>
<script src="js/Particleground.js" ></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  //验证码
  });
  //测试提交，对接程序删除即可
//   $(".submit_btn").click(function(){
// 	  location.href="./loginDeal.php";
// 	  });
// });
</script>
</head>
<body>
<dl class="admin_login">
 <dt>
  <strong>交大峨眉教务</strong>
  <em>157er</em>
 </dt>
 <form action="./loginDeal.php" method="post">
 <dd class="user_icon">
  <input type="text" placeholder="学号" name="user_id" class="login_txtbx"/>
 </dd>
 <dd class="pwd_icon">
  <input type="password" placeholder="密码" name="password" class="login_txtbx"/>
 </dd>
 <dd class="val_icon">
  <div class="checkcode">
    <input type="text" id="J_codetext" name="ranstring" placeholder="验证码" style="width: 190px;" maxlength="4" class="login_txtbx">
    <img src="./codeImg/tem.jpg" style="z-index: 999; width: 90px;height: 42px; margin-left: 5px;" />
    <input type="hidden" name="vCookie" value="<?php echo $vCookie; ?>" />
  </div>

  <!-- 验证码地址-->
  
 </dd> 
 <dd>
  <input type="submit" value="立即登陆" class="submit_btn"/>
 </dd>
 </form>
 <dd>
  <p>© <?php echo date('Y') ?> XiongXiaofei 版权所有</p>
  <p>计算机科技与应用协会</p>
 </dd>
</dl>
</body>
</html>
