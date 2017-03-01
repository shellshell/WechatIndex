<?php 
	require('./getClassroom.php');
	// 教室号
	$classNum = getclassroom(1);
	// 教室空闲节数
	$classNode = getclassroom(0);
 ?>
<?php 
	require('./header.html');
	require('./btn_header.html');
 ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-bordered table-responsive table-striped">
				<tr align="center">
					<td><strong>教室</strong></td>
					<td><strong>节次<strong></td>
				</tr>
				<tbody>
				<?php
					for ($i = 0; $i < count($classNum); $i++) {
						echo "<tr align='center'>";
							echo "<td>";
								echo $classNum[$i];
							echo "</td>";
							echo "<td>";
								echo $classNode[$i];
							echo "</td>";
						echo "</tr>";
					}
				 ?>
				 </tbody>
			</table>
		</div>
	</div>
</div>


 <?php 
 	require('./footer.html');
  ?>
  <script src="../js/"></script>