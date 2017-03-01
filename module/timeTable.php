<?php
	session_start();
	$user_id = $_SESSION['user_id'];
	require('./getTimeTable.php');
	$timeTable = getTimeTable($user_id);
 ?>

<?php 
	require('./header.html');
	// 默认放大0.7倍窗口 禁止缩放
	echo '<meta content="width=device-width, initial-scale=0.6, maximum-scale=1.0, user-scalable=0" name="viewport">';
?>

<!-- 导航栏 -->
<?php require('./btn_header.html'); ?>


<!-- 课表 -->
<div class="container container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<?php
				echo  trim($timeTable);
				
			 ?>
		</div>
	</div>
</div>


 <?php 
 	require('./footer.html');
  ?>

 <script>
 	jQuery(document).ready(function($) {
 		$("#table3").addClass('table table-hover table-condensed table-striped table-responsive');
 		$("table").removeAttr('width').removeAttr('height').removeAttr('border');
 		$("table td").removeAttr('width').removeAttr('height').removeAttr('bgcolor');
 	});

 </script>