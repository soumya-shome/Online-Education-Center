<?php
require("header bar.php");
?>
<div class="container-fluid">
<?php
	$r1=mysqli_query($con,"SELECT * FROM `course`");
	$c1=mysqli_num_rows($r1);
	$t=NULL;
	if($c1>0){
?>
	<table border="1" class="table-responsive table-condensed">
		<thead>
			<tr>
				<th>Course Id</th>
				<th>Name</th>
				<th>Paper Sets</th>
				<th>Option </th>
			</tr>
		</thead>
		<tbody>
			<form method="post" action="viewQp2.php">
<?php
		while($row=mysqli_fetch_array($r1)){
			if($row[1]!=NULL){
				$r2=mysqli_query($con,"SELECT * FROM `paper_set` WHERE `c_id`='".$row[0]."'");
				$c2=mysqli_num_rows($r2);
?>
			<tr>
				<th><?php echo $row[0] ?></th>
				<th><?php echo $row[1] ?></th>
				<?php
				if($c2>0){
					?>
				<th>
				<?php
						while($row2=mysqli_fetch_array($r2)){
							if($row2[2]=="OFFLINE")
								$t='OFFLINE';
							else
								$t='ONLINE';
						?>
						<input type="radio" value="<?php echo $row2[0] ?>" name="t1"><?php echo $row2[0]." (".$t.")"?> <br>
						<?php
						}
						?>
				</th>
				<th><input type="submit" value="View"></th>
				<?php
				}
				else{
				?>
				<th>None </th>
				<th >-</th>
				<?php
				}
				?>
				</tr>
<?php 
			}
		}
			?>
	</form>
		</tbody>
	</table>
<?php
	}
	else{
		echo "<h1>No Record/s Found</h1>";
	}
?>
</div>
</body>
</html>