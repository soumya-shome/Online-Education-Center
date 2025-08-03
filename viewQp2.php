<?php
require("header bar.php");
?>
<div>
<?php
$pcode=$_REQUEST['t1'];
$r1=mysqli_query($con,"SELECT `type` FROM `paper_set` WHERE `p_id`='".$pcode."'");
$row1=mysqli_fetch_array($r1);
if($row1[0]=="OFFLINE"){
	$r2=mysqli_query($con,"SELECT * FROM `p_off` WHERE `p_id`='".$pcode."'");
	$row2=mysqli_fetch_array($r2);
	?>
	<form action="ediQp2.php" method="post">
		<?php
	if( $row2[3]!=NULL && $row2[4]!=NULL){
		?>
		Total Marks: <?php echo $row2[3] ?><br><br>
		Total Exam Time: <?php echo $row2[4] ?><br><br>
		<?php
			if($row2[2]!=NULL){
				mysqli_query($con,"UPDATE `paper_set` SET `status`='COMPLETE' WHERE `p_id`='".$pcode."'");
				?>
		Question Paper: <a href="<?php echo "Files/".$row2[2] ?>" target="_blank"> View Question Paper </a><br><br>
		<button type="submit" value="<?php echo $pcode?>" name="t3">Delete Paper</button>
	<?php
			}
			else{
				mysqli_query($con,"UPDATE `paper_set` SET `status`='INCOMPLETE' WHERE `p_id`='".$pcode."'");
				?>
				<button type="submit" value="<?php echo $pcode?>" name="t2">Add Paper</button>
			<?php
			}
	}
	else{
		
		echo "No Question Paper is Available";
		?>
		<br><br>
		
	<?php
	}
	
	?>
		<button type="submit" value="<?php echo $pcode?>" name="t1">Edit Question</button>
		</form>
		<?php
}
else{//online
	
	$r2=mysqli_query($con,"SELECT * FROM `p_on` WHERE `p_id`='".$pcode."'");
	$row2=mysqli_fetch_array($r2);
	$r3=mysqli_query($con,"SELECT * FROM `question` WHERE `p_id`='".$pcode."'");
	$c1=0;
	while($row3=mysqli_fetch_array($r3)){
		if($row3[2]!=NULL){
			$c1=$c1+1;
		}
	}
	if($c1<$row2[3]){
		mysqli_query($con,"UPDATE `paper_set` SET `status`='INCOMPLETE' WHERE `p_id`='".$pcode."'");
	}else{
		mysqli_query($con,"UPDATE `paper_set` SET `status`='COMPLETE' WHERE `p_id`='".$pcode."'");
	}
	$r1=mysqli_query($con,"SELECT * FROM `paper_set` WHERE `p_id`='".$pcode."'");
	$row=mysqli_fetch_array($r1);
	?>
	<form action="editQp.php" method="post">
	<?php
		if($row2[2]!=NULL && $row2[3]!=NULL && $row2[4]!=NULL && $row2[5]!=NULL){
	?>
		<table class="table-responsive" border="1" >
			<thead>
				<tr>
					<th>Total Marks</th>
					<th>Total Exam Time</th>
					<th>Total No. of Questions</th>
					<th>Total No. of Questions Entered</th>
					<th>Total Marks</th>
					<th>Marks/ Question</th>
					<th>Negative Marks/ Question</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th><?php echo $row2[5] ?></th>
					<th><?php echo $row2[2] ?> Mins</th>
					<th><?php echo $row2[3] ?></th>
					<th><?php echo $c1 ?></th>
					<th><?php echo $row2[5] ?></th>
					<th><?php echo $row2[6] ?></th>
					<th><?php echo $row2[4] ?></th>
					<th><?php echo $row[3] ?></th>
				</tr>
			</tbody>
		</table><br>
<?php 
		if($c1<=$row2[3] && $row2[3]!=NULL){
		?><button type="submit" value="<?php echo $pcode?>" name="t1">Add Question</button>
	<?php
		}			
	}
	else{
		echo "No Questions is Available";
		?>
		<br><br>
		<?php
			if($c1<=$row2[3] && $row2[3]!=NULL){
		?><button type="submit" value="<?php echo $pcode?>" name="t1">Add Question</button>
	<?php
	}
}
	?><button type="submit" value="<?php echo $pcode?>" name="t2">Edit Details</button>
		</form>
	
	<?php
		if(mysqli_num_rows($r3)>0){
			?>
	<br><br>
		<table class="table-responsive" border="1">
			
			<thead>
				<tr>
					<th>Question No.</th>
					<th>Question </th>
					<th>Option No. 1</th>
					<th>Option No. 2</th>
					<th>Option No. 3</th>
					<th>Option No. 4</th>
					<th>Correct Option</th>
					<th>Settings</th>
				</tr>
			</thead>
			
			<tbody>
				<form action="editQp.php" method="post">
					<input type="text" value="<?php echo $pcode ?>" name="v1" hidden="">
				<?php
					$r3=mysqli_query($con,"SELECT * FROM `question` WHERE `p_id`='".$pcode."'");
					while($row3=mysqli_fetch_array($r3)){ 
						?>
						<tr>
							<?php
							
						?>
							<th><?php echo $row3[1] ?></th>
							<th><?php echo $row3[2] ?></th>
							<th><?php echo $row3[3] ?></th>
							<th><?php echo $row3[4] ?></th>
							<th><?php echo $row3[5] ?></th>
							<th><?php echo $row3[6] ?></th>
							<th><?php echo $row3[7] ?></th>
							<th><button type="submit" name="t3" value="<?php echo $row3[1] ?>">Edit</button>
								<?php
								if($row3[2]!=NULL){
							?>
								<button type="submit" value="<?php echo $row3[1] ?>" name="t4">Delete</button></th>
					<?php
								}
							?>
					</tr>
				<?php
					}
			?>
				</form>
			</tbody>
		</table>
		<?php
		}
}
?>
</div>
</body>
</html>