<?php
	require('./getScore.php');
	session_start();
	// 从session取学号、分数、课程名
	$user_id = $_SESSION['user_id']; 
	$score = getScore($user_id,"qweqweqwe",1);
	$course = getScore($user_id,"qweqwewq",0);
 ?>
<?php 
	require('./header.html');
  ?>
<?php 
	require('./btn_header.html');
 ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-responsive table-striped table-bordered" style="margin-top: 10px;" >
				<tr class="info" align="center">
					<td><strong>序号</strong></td>
					<td><strong>课程</strong></td>
					<td><strong>分数</strong></td>
				</tr>
				<?php 
				for ($i=0; $i <count($score) ; $i++) {
					// 索引
					$index = $i + 1; 
					// 对不及格行做红色处理
					if ($score[$i]<60) {
						echo "<tr class='danger' align='center'><td>";
						echo "{$index}</td>";
						echo "<td>";
						echo $course[$i];
						echo "</td>";
						echo "<td><b><span class='badge'>";
						echo $score[$i];
						echo "</span></b>";
					}else{
						echo "<tr align='center'><td>";
						echo "{$index}</td>";
						echo "<td>";
						echo $course[$i];
						echo "</td>";
						echo "<td><span class='badge' >";
						echo $score[$i];
						echo "</span>";
						
					}
					echo "</td></tr>";
					
				}
				 ?>
			</table>
		</div>
	</div>
</div>

<blockquote class="blockquote-reverse">
  <small><?php echo htmlspecialchars(" 没有啦 ヾ(≧∇≦*)ゝ") ?></small>
</blockquote>

<?php 
	require('./footer.html');
 ?>
 
