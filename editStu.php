<?php
require("header bar.php");
?>
<div class="container-fluid">
<?php
	if($_SESSION['ed']==0){
		header("Location:viewStu.php");
	}
	if(isset($_REQUEST['b1'])){
		$a=$_REQUEST['b1'];
		$r1=mysqli_query($con,"SELECT * FROM `student` WHERE `s_id`='".$a."'");
		?>
	EDIT Details
	<?php
		$row=mysqli_fetch_array($r1);
	?>
	<form method="post" action="">
		Student ID <input type="text" value="<?php echo $row[0] ?>" name="t1" readonly><br><br>
		First Name <input type="text" value="<?php echo $row[1] ?>" name="t2" ><br><br> 
		Last Name <input type="text" value="<?php echo $row[2] ?>" name="t3" ><br><br>
		Gender [Male(M)/Female(F)/Others(O)]<input type="text" value="<?php echo $row[3] ?>" name="t4" ><br><br>
		Email <input type="text" value="<?php echo $row[4] ?>" name="t5" ><br><br>
		Phone No. <input type="text" value="<?php echo $row[5] ?>" name="t6" ><br><br>
		Alternate Phone no. <input type="text" value="<?php echo $row[6] ?>" name="t7" ><br><br>
		Date of Admission <input type="date" value="<?php echo $row[7] ?>" name="t8" ><br><br>
		<input type="submit" name="b3" value="Enter"> 
	</form>
	
	<?php
	}
	elseif(isset($_REQUEST['b2'])){
		$b=$_REQUEST['b2'];
		echo "Are you Sure You want to delete ";
		?>
		<form method="post" action="">
			<input type="text" value="<?php echo $b ?>" name="s" readonly>
			<input type="radio" name="d" value="Y">Yes
			<input type="radio" name="d" value="N">No<br>
			<input type="submit" name="b4" value="Enter"> 
		</form>
	<?php
	}
	elseif(isset($_REQUEST['b3'])){
		$r1=mysqli_query($con,"UPDATE `student` SET `f_name`='".$_REQUEST['t2']."',`l_name`='".$_REQUEST['t3']."',`gender`='".$_REQUEST['t4']."',`email`='".$_REQUEST['t5']."',`ph_no`='".$_REQUEST['t6']."',`ph_no_2`='".$_REQUEST['t7']."',`d_o_a`='".$_REQUEST['t8']."' WHERE `s_id`='".$_REQUEST['t1']."'");
		if($r1){
			echo "Updated Succesfully";
			$_SESSION['ed']=0;
		}
	}
	elseif(isset($_REQUEST['b4'])){
		$t=$_REQUEST['d'];
		if($t=='Y'){
		$r1=mysqli_query($con,"DELETE `f_name`,`l_name`,`gender`,`ph_no`,`ph_no_2`,`d_o_a` FROM `student` WHERE `s_id`='".$_REQUEST['s']."'");
		if($r1){
			echo "Deleted Succesfully";
			$_SESSION['ed']=0;
		}
		}
		elseif($t=='N'){
			header("Location:viewStu.php");
			$_SESSION['ed']=0;
		}
	}
	
	
?>
</div>
</body>
</html>