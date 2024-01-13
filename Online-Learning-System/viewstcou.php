<?php
require "header bar.php";
?>
<div class="container-fluid">
	<?php
	$r=mysqli_query($con,"SELECT * FROM `st_course`");
	if(mysqli_num_rows($r)>0){	
	?>
	<table border="1">
		<thead>
			<tr>
				<th>Student ID</th>
				<th>Course ID</th>
				<th>Date of Commencement</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
				while($row=mysqli_fetch_array($r)){
			?>
				<tr>
					<th><?php echo $row[0] ?></th>
					<th><?php echo $row[1] ?></th>
					<th><?php echo $row[2] ?></th>
					<th><?php echo $row[3] ?></th>
				</tr>
			<?php
				}
		?>
		</tbody>
	</table>
	<?php
	}
	?>
</div>