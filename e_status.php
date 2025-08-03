<?php
require "header bar.php";
?>
<div class="container-fluid">
	<?php
	$r=mysqli_query($con,"SELECT * FROM `exam`");
	$c=mysqli_num_rows($r);
	if($c>0){
	?>
	<table border="1" class="table-responsive">
		<thead>
			<tr>
				<th>Exam ID</th>
				<th>Exam Date</th>
				<th>Exam Slot</th>
				<th>Student ID</th>
				<th>Course ID</th>
				<th>Paper Type</th>
				<th>Status</th>
				<th>Settings</th>
			</tr>
		</thead>
		<tbody>
			<form action="e_status_2.php" method="post">
			<?php
		
			while($row=mysqli_fetch_array($r)){
				?>
			<tr>
				<th><?php echo $row[0] ?></th>
				<th><?php echo $row[1] ?></th>
				<th><?php echo $row[2] ?></th>
				<th><?php echo $row[3] ?></th>
				<th><?php echo $row[4] ?></th>
				<th><?php echo $row[5] ?></th>
				<th><?php echo $row[8] ?></th>
				<th><button type="submit" value="<?php echo $row[0] ?>" name="b1">Edit</button><button type="submit" value="<?php echo $row[0] ?>" name="b2">Delete</button></th>
			</tr>
			<?php
			}
		?>
			</form>
		</tbody>
	</table>
	<?php
	}
	else{
		echo "No Exam Data Available";
	}
		?>
	</div>	
</body>
</html>