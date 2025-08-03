<?php
require("header bar.php");
?>

<?php
$r=mysqli_query($con,"SELECT * FROM `exam_sl`");
$c=mysqli_num_rows($r);
?>
<form method="post" action="e_sl1.php">
	<?php
	if($c>0){
	?>Exam Slots:
	<table border="1">
		<thead>
			<tr>
				<th>Slot No</th>
				<th>Starting Time</th>
				<th>Ending Time</th>
				<th>Settings</th>
			</tr>
		</thead>
		<tbody>
		<?php
			$a=1;
			while($row=mysqli_fetch_array($r)){
				?>
			<tr>
				<th><?php echo $a; $a=$a+1 ?></th>
				<th><?php echo $row[1] ?></th>
				<th><?php echo $row[2] ?></th>
				<th><button type="submit" value="<?php echo $row[0] ?>" name="b2">Edit</button>
					<button type="submit" value="<?php echo $row[0] ?>" name="b3">Delete</button>
					</th>
			</tr>
			<?php
			}
		?>
		</tbody>
	</table>
	<br>
	<?php
	}
	else{
	?>No Exam Slot Available
	<?php
	}
	?>
	<br><button type="submit" name="b1">Enter New Slot</button>
	
</form>