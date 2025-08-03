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
					<th>Option</th>
				</tr>
			</thead>
			<tbody>
				<?php
					while($row=mysqli_fetch_array($r)){
				?>
					<tr>
					<form  method="post" action="st_c_update.php">
						<input type="text" value="<?php echo $row[0] ?>" name="t1" hidden>
						<input type="text" value="<?php echo $row[1] ?>" name="t2" hidden>
						<input type="text" value="<?php echo $row[2] ?>" name="t3" hidden>
						<th><?php echo $row[0] ?></th>
						<th><?php echo $row[1] ?></th>
						<th><?php echo $row[2] ?></th>
						<th><?php echo $row[3] ?></th>
						<th><button type="submit" name="bu2">Edit</button><button type="submit" name="bu1">Delete</button></th>
					</form>
					</tr>
				<?php
					}
			?>
			</tbody>
		</table>
		<?php
		}else{
			echo "No Details Available";
		}
	?>
</div>