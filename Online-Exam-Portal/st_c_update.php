<?php
require "header bar.php";
?>
<div class="container-fluid">
	<?php
	if(isset($_REQUEST['bu1'])){
		$a=$_REQUEST['t1'];
		$b=$_REQUEST['t2'];
		$c=$_REQUEST['t3'];
		$r=mysqli_query($con,"DELETE FROM `st_course` WHERE `st_id`='".$a."' AND `c_id`='".$b."' and `d_o_c`='".$c."'");
		if($r){
			echo "DELETED SUCCESSFULLY";
		}else{
			echo "ERROR";	
		}
	}elseif(isset($_REQUEST['b3'])){
		$r=mysqli_query($con,"UPDATE `st_course` SET `status`='".$_REQUEST['t3']."' WHERE `st_id`='".$_REQUEST['t1']."' AND `c_id`='".$_REQUEST['t2']."'");
		if($r){
			echo "Status Updated Successfully";
		}else{
			echo "Updation Failed";
		}
	}elseif(isset($_REQUEST['bu2'])){
		$st_id=$_REQUEST['t1'];
		$cid=$_REQUEST['t2'];
	?>
	<form method="post" action="">
		<input type="text" value="<?php echo $st_id ?>" name="t1" hidden>
		<input type="text" value="<?php echo $cid ?>" name="t2" hidden>
		Update Status : <select name="t3">
			<option value="COMPLETED">Completed</option>
			<option value="INCOMPLETE">Incomplete</option>
			<option value="EXAM">Exam</option>
			<option value="PASSED">Passed</option>
			<option value="FAILED">Failed</option>
			<option value="CERTIFIED">Certified</option>
		</select><br>
		<input type="submit" name="b3">
	</form>
	<?php
	}elseif(isset($_REQUEST['b1'])){
		$st_id=$_REQUEST['t1'];
		$r=mysqli_query($con,"SELECT * FROM `st_course` WHERE `st_id`='".$st_id."'");
		?>
		<form action="" method="post">
			<input type="text" value="<?php echo $st_id ?>" name="t2" hidden>
			Select Course to Update Status : <select name="t1">
			<?php
				while($row=mysqli_fetch_array($r)){
					?>
					<option value="<?php echo $row[1]?>"><?php echo $row[1]."-".$row[3] ?></option>
			<?php
				}
		?>
			</select>
			<br>
			<input type="submit" name="b2">
		</form>
	<?php
	}else{
		$r=mysqli_query($con,"SELECT DISTINCT st_id FROM `st_course`");
		if(mysqli_num_rows($r)>0){
		?>
			<form method="post" action="">
				Student ID: <select name="t1">
					<?php
					while($row=mysqli_fetch_array($r)){
						?>
					<option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
				<?php
					}
					?>
				</select><br>
				<input type="submit" name="b1">
			</form>
		<?php
		}
	}
	?>

</div>