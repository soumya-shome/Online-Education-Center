<?php
require("header bar.php");
?>
<div class="container-fluid">
<?php
	$r1=mysqli_query($con,"SELECT * FROM `student`");
	$count1=mysqli_num_rows($r1);
					
	if($count1>0){
		$_SESSION['ed']=1;
	?>
		
	
	<table border="1" class="table-responsive table-condensed">
		<thead>
			<tr>
				<th>Student Id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
				<th>Email Id</th>
				<th>Phone No.</th>
				<th>Alternative Phone No.</th>
				<th>Date of Admission</th>
				<th>Settings</th>
			</tr>
		</thead>
		<tbody>
			<form method="post" action="editStu.php">
<?php
		while($row=mysqli_fetch_array($r1)){
?>
			<tr>
				<th><?php echo $row[0] ?></th>
				<th><?php echo $row[1] ?></th>
				<th><?php echo $row[2] ?></th>
				<th><?php echo $row[3] ?></th>
				<th><?php echo $row[4] ?></th>
				<th><?php echo $row[5] ?></th>
				<th><?php echo $row[6] ?></th>
				<th><?php echo $row[7] ?></th>
				<th><button type="submit" class="btn-primary" name="b1" value="<?php echo $row[0] ?>" >Edit</button>
					<?php
			if($row[1]!=NULL){
			?>
					<button type="submit" class="btn-danger" name="b2" value="<?php echo $row[0] ?>">Delete</button>
			<?php
			}
					?>	</th>
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
		echo "<h1>No Record/s Found</h1>";
	}
?>
</div>
</body>
</html>