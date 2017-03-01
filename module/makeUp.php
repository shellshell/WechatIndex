<?php 
	require('./getMakeUp.php');
	session_start();
	$user_id = $_SESSION['user_id'];
	$makeUp = getMakeUp($user_id);
	if ($makeUp == 0) {
		require('./header.html');
		require('./btn_header.html');
		echo '
		<div class="page-header">
		  <h1>你暂时还没有补考哦 <small>Subtexto(￣ε￣*)</small></h1>
		</div>';
		require('./footer.html');
		exit();

	}
	$course = $makeUp[0];
	$testTime = $makeUp[1];
	$plaece = $makeUp[2];
 ?>
<?php 
	require('./header.html');
	require('./btn_header.html');
 ?>
 <div class="container">
 	<div class="row">
 		<div class="col-sm-12">
 			<table class="table table-striped table-responsive">
 				<tbody>
 					<tr align="center">
 						<td>
							<strong>ID</strong>
 						</td>
 						<td>
 							<strong>课目</strong>
 						</td>
 						<td>
 							<strong>时间</strong>
 						</td>
 						<td>
 							<strong>地点</strong>
 						</td>
 					</tr>
 					<?php 
 						for ($i = 0; $i < count($course) ; $i++) { 
 							echo "<tr align='center'>";
 								echo "<td>";
 									echo $i+1;
 								echo "</td>";
 								echo "<td>";
 									echo $course[$i];
 								echo "</td>";
 								echo "<td>";
 									echo $testTime[$i];
 								echo "</td>";
 								echo "<td>";
 									echo $plaece[$i];
 								echo "</td>";
 							echo "</tr>";
 						}
 					 ?>
 				</tbody>
 			</table>
 		</div>
 	</div>
 	<div class="row">
 		<div class="col-sm-12">
 			<blockquote>监考时间：
 			<ul class="list-unstyled">
 				<li><small>第一场：8:00-10:00</small></li>
 				<li><small>第二场：10:30-12:30</small></li>
 				<li><small>第三场：13:30-15:30</small></li>
 				<li><small>第四场：16:00-18:00</small></li>
 				<li><small>第五场：19:00-21:00</small></li>
 			</ul>
 			</blockquote>
 		</div>
 	</div>
 </div>
<?php 
	require('./footer.html');
 ?>