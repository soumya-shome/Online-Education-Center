<?php
require("header bar.php");
?>
<div class="container-fluid">
<?php
	$r1=mysqli_query($con,"SELECT * FROM `course`");
	$count1=mysqli_num_rows($r1);
					
	if($count1>0){
		$_SESSION['cou']=1;
	?>
		
	
	<table border="1" class="table-responsive table-condensed">
		<thead>
			<tr>
				<th>Course Id</th>
				<th>Name</th>
				<th>Duration</th>
				<th>Description</th>
				<th>File</th>
				<th>Settings</th>
			</tr>
		</thead>
		<tbody>
			<form method="post" action="editCou.php">
<?php
		while($row=mysqli_fetch_array($r1)){
?>
			<tr>
				<th><?php echo $row[0] ?></th>
				<th><?php echo $row[1] ?></th>
				<th><?php echo $row[2] ?></th>
				<th><?php echo $row[3] ?></th>
<?php 
			if($row[4] != NULL){
?>
				<th><a href ="<?php echo "Files/".$row[4]?>" download>More Details</a> </th>
<?php
							   }
				else{
?>
				<th> </th>
<?php
				}
?>
				<th><button type="submit" class="btn-primary" name="b1" value="<?php echo $row[0] ?>" >Edit</button>
<?php
			if($row[1]!=NULL){
?>
					<button type="submit" class="btn-danger" name="b2" value="<?php echo $row[0] ?>">Delete</button>
<?php
			}
?>
				</th>
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