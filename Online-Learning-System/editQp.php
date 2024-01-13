<?php
require("header bar.php");
?>
<script type="text/javascript">
        function sum() {
            var txtFirstNo = document.getElementById('t4').value;
            var txtSecondNo = document.getElementById('t3').value;
            var result = parseInt(txtFirstNo) * parseInt(txtSecondNo);
            if (!isNaN(result)) {
                document.getElementById('t6').value = result;
            }
        }
	
	function check(){
		window.location.href="ViewQP.php";
	}
    </script>
<div>
<?php
	if(isset($_REQUEST['b1'])){
		$qno=$_REQUEST['t1'];
		$pcode=$_REQUEST['t0'];
		$q= mysqli_real_escape_string($con, $_REQUEST['t2']);
		$op1= mysqli_real_escape_string($con, $_REQUEST['t3']);
		$op2= mysqli_real_escape_string($con, $_REQUEST['t4']);
		$op3= mysqli_real_escape_string($con, $_REQUEST['t5']);
		$op4= mysqli_real_escape_string($con, $_REQUEST['t6']);
		$co= $_REQUEST['t7'];
		//echo "SELECT * FROM `question` WHERE `p_id`='".$pcode."' AND `q_no` = '".$qno."'<br>";
		$r1=mysqli_query($con,"SELECT * FROM `question` WHERE `p_id`='".$pcode."' AND `q_no` = '".$qno."'");
		if($r1 && mysqli_num_rows($r1)<=0){
		$r=mysqli_query($con,"INSERT INTO `question`(`p_id`, `q_no`, `ques`, `op1`, `op2`, `op3`, `op4`, `c_opt`) VALUES ('".$pcode."','".$qno."','".$q."','".$op1."','".$op2."','".$op3."','".$op4."','".$co."')");
		if($r){
			echo "Entered Successfully";
			?>
			<form action="" method="post">
				Enter new Question ? <br>
				<button type="submit"  name="t1" value="<?php echo $pcode ?>" >Yes</button>
				<button type="button" onClick="check()">No</button>
	</form>
	<?php
		}
		else{
			echo "ERROR !! Try again Later !!";
		}
		}else{
			echo "Already Exists";
		}
	}elseif(isset($_REQUEST['b2'])){
		$qno=$_REQUEST['t1'];
		$pcode=$_REQUEST['t0'];
		$q= mysqli_real_escape_string($con, $_REQUEST['t2']);
		$op1= mysqli_real_escape_string($con, $_REQUEST['t3']);
		$op2= mysqli_real_escape_string($con, $_REQUEST['t4']);
		$op3= mysqli_real_escape_string($con, $_REQUEST['t5']);
		$op4= mysqli_real_escape_string($con, $_REQUEST['t6']);
		$co= $_REQUEST['t7'];
		$r=mysqli_query($con,"UPDATE `question` SET `ques`='".$q."',`op1`='".$op1."',`op2`='".$op2."',`op3`='".$op3."',`op4`='".$op4."',`c_opt`='".$co."' WHERE `p_id`='".$pcode."' AND `q_no`='".$qno."'");
		if($r){
			echo "Updated Successfully";
		}
		else{
			echo "ERROR !! Try again Later !!";
		}
	}
	elseif(isset($_REQUEST['b3'])){
		$pcode=$_REQUEST['t1'];
		$time=$_REQUEST['t2'];
		$noQ=$_REQUEST['t3'];
		$MpQ=$_REQUEST['t4'];
		$NM=$_REQUEST['t5'];
		$TM=$_REQUEST['t6'];
		$r2=mysqli_query($con,"UPDATE `p_on` SET `time`='".$time."',`no_of_q`='".$noQ."',`ne_marks`='".$NM."',`tot_marks`='".$TM."',`p_q_marks`='".$MpQ."' WHERE `p_id`='".$pcode."'");
		if($r2){
			echo "Details Edited Successfully";
		}
	}
	elseif(isset($_REQUEST['b4'])){
		$d=$_REQUEST['r1'];
		$pcode=$_REQUEST['v1'];
		$q=$_REQUEST['v2'];
		if($d=="Y"){
		$r=mysqli_query($con,"UPDATE `question` SET `ques`='',`op1`='',`op2`='',`op3`='',`op4`='',`c_opt`='' WHERE `p_id`='".$pcode."' AND `q_no`='".$q."'");
		if($r){
			echo "Deleted Successfully";
		}
		}
		else{
			header("Location:adminHome.php");
		}
	}
	elseif(isset($_REQUEST['t1'])){
		$pcode=$_REQUEST['t1'];
		$r1=mysqli_query($con,"SELECT * FROM `p_on` WHERE `p_id`='".$pcode."'");
		$row1=mysqli_fetch_array($r1);
		$r2=mysqli_query($con,"SELECT * FROM `question` WHERE `p_id`='".$pcode."'");
		$c=mysqli_num_rows($r2);
		$noQ=$row1[3];
		$Qn=$c+1;
		if($Qn<=$noQ){
			?>
			<form method="post" action="">
				Paper Code: <input type="text" value="<?php echo $pcode ?>" name="t0" readonly><br><br>
				Question No. : <input type="text" name="t1" value="<?php echo $Qn ?>" required readonly><br><br>
				Question : <textarea id="text" cols="40" rows="4" name="t2" placeholder="Enter Question ..." required></textarea><br><br>
				Option 1 : <textarea id="text" cols="40" rows="2" name="t3" placeholder="Enter Option1 ..." required></textarea><br><br>
				Option 2 : <textarea id="text" cols="40" rows="2" name="t4" placeholder="Enter Option2 ..." required></textarea><br><br>
				Option 3 : <textarea id="text" cols="40" rows="2" name="t5" placeholder="Enter Option3 ..." required></textarea><br><br>
				Option 4 : <textarea id="text" cols="40" rows="2" name="t6" placeholder="Enter Option4 ..." required></textarea><br><br>
				Correct Option : <input type="number" min="1" max="4" value="1" name="t7" required> <br><br>
				<input type="submit" value="Enter" name="b1">
			</form>
	<?php
		}
		else{
			echo "All Questions have been entered.<br>Edit the deleted questions.";
		}
	}
	elseif(isset($_REQUEST['t2'])){
		$pcode=$_REQUEST['t2'];
		$r1=mysqli_query($con,"SELECT * FROM `p_on` WHERE `p_id`='".$pcode."'");
		$row1=mysqli_fetch_array($r1);
		?>
		<form method="post" action="">
			Paper ID:<input type="text" name="t1" value="<?php echo $row1[0]?>" readonly><br><br>
			Time : <input type="text" name="t2" value="<?php echo $row1[2]?>" required>(In Minutes)<br><br>
			No. of Question : <input type="text" id="t3" name="t3" value="<?php echo $row1[3]?>" onKeyup="sum()" required><br><br>
			Marks per Question:<input type="text" name="t4" id="t4" value="<?php echo $row1[6]?>" onKeyup="sum()" required><br><br>
			Negative Marks per Question:<input type="text" name="t5" value="<?php echo $row1[4]?>" required><br><br>
			Total Marks : <input type="text" name="t6" id="t6" value="<?php echo $row1[5]?>" readonly required><br><br>
			<input type="submit" name="b3" value="Enter">
		</form>
		<?php
	}
	elseif(isset($_REQUEST['t3'])){
		$pcode=$_REQUEST['v1'];
		$q=$_REQUEST['t3'];
		$r1=mysqli_query($con,"SELECT * FROM `question` WHERE `p_id`='".$pcode."' AND `q_no`= '".$q."'");
		$row1=mysqli_fetch_array($r1);
?>
			<form method="post" action="">
				Paper Code: <input type="text" value="<?php echo $row1[0] ?>" name="t0" readonly><br><br>
				Question No. : <input type="text" name="t1" value="<?php echo $row1[1] ?>" required readonly><br><br>
				Question : <textarea id="text" cols="40" rows="4" name="t2" placeholder="Enter Question ..." required><?php echo $row1[2] ?></textarea><br><br>
				Option 1 : <textarea id="text" cols="40" rows="2" name="t3" placeholder="Enter Option1 ..." required><?php echo $row1[3] ?></textarea><br><br>
				Option 2 : <textarea id="text" cols="40" rows="2" name="t4" placeholder="Enter Option2 ..." required><?php echo $row1[4] ?></textarea><br><br>
				Option 3 : <textarea id="text" cols="40" rows="2" name="t5" placeholder="Enter Option3 ..." required><?php echo $row1[5] ?></textarea><br><br>
				Option 4 : <textarea id="text" cols="40" rows="2" name="t6" placeholder="Enter Option4 ..." required><?php echo $row1[6] ?></textarea><br><br>
				Correct Option : <input type="number" min="1" max="4" value="<?php if($row1[7]!=NULL){ echo $row1[7]; }else { echo "1";}?>" name="t7" required> <br><br>
				<input type="submit" value="Enter" name="b2">
			</form>
	<?php
	}
	elseif(isset($_REQUEST['t4'])){
		$pcode=$_REQUEST['v1'];
		$q=$_REQUEST['t4'];
		?>
		Are You Sure ,you want to delete this Question No.<?php echo " ".$q ?>?
	<form action="" method="post">
		<input type="text" value="<?php echo $pcode ?>" name="v1" hidden="">
		<input type="text" value="<?php echo $q ?>" name="v2" hidden="">
		<input type="radio" name="r1" value="Y" required>Yes<br>
		<input type="radio" name="r1" value="N" required>No<br>
		<input type="submit" name="b4" value="Delete">
	</form>
	<?php
	}
?>
</div>
</body>
</html>