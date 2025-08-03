<?php
require "header bar.php";
?>
<div class="container-fluid">
	<?php
	if(isset($_REQUEST['b1'])){
		$r=mysqli_query($con,"SELECT * FROM `exam` WHERE `e_id`='".$_REQUEST['b1']."'");
		$row=mysqli_fetch_array($r);
		?>
		<form method="post" action="">
			Exam ID: <input type="text" value="<?php echo $row[0] ?>" name="t1" readonly><br>
			Student ID: <input type="text" value="<?php echo $row[3] ?>" name="t4" readonly ><br>
			Course ID: <input type="text" value="<?php echo $row[4] ?>" name="t5" readonly><br>
			Paper Type: <input type="text" value="<?php echo $row[5] ?>" name="t6" readonly><br>
			Exam Date: <input type="text" value="<?php echo $row[1] ?>" name="t2" required><br>
			Exam Slot: <input type="text" value="<?php echo $row[2] ?>" name="t3" required><br>
			<input type="submit" name="b3"><br>
		</form>
	<?php
	}
	elseif(isset($_REQUEST['b2'])){
		?>
		<form method="post" action="">
			<input type="text" value="<?php echo $_REQUEST['b2'] ?>" name="t1" hidden>
			Do You want to delete the exam id ?
			<br><input type="radio" name="t2" value="Y">Yes
			<br><input type="radio" name="t2" value="N">No
			<br><input type="submit" name="b4">
	
	</form>
	<?php
	}
	elseif(isset($_REQUEST['b3'])){
		$r=mysqli_query($con,"UPDATE `exam` SET `e_date`='".$_REQUEST['t2']."',`e_slot`='".$_REQUEST['t3']."' WHERE `e_id`='".$_REQUEST['t1']."'");
		if($r){
			echo "Success";
		}
		else{
			echo "Try Again";
		}
	}
	elseif(isset($_REQUEST['b4'])){
		if($_REQUEST['t2']=='Y'){
			$r=mysqli_query($con,"DELETE FROM `exam` WHERE `e_id`='".$_REQUEST['t1']."'");
			if($r){
				echo "Success";
			}
			else{
				echo "Try Again";
			}
		}else{
			header("Location:e_status.php");
		}
	}
	?>
</div>	
</body>
</html>