<?php
require("header bar.php");
?>
<?php
if(isset($_REQUEST['n1'])){
	$a=$_REQUEST['t1'];
	$b=$_REQUEST['t2'];
	$r=mysqli_query($con,"SELECT * FROM `exam_sl`");
	$n=(mysqli_num_rows($r))+1;
	if((int)$a<(int)$b){
		mysqli_query($con,"INSERT INTO `exam_sl`(`slot_no`, `f_time`, `t_time`) VALUES ('".$n."','".$a."','".$b."')");
		echo "Inserted Successfully";
	}else{
		echo "Enter a valid time range";
	}
}elseif(isset($_REQUEST['n2'])){
	$a=$_REQUEST['t1'];
	$b=$_REQUEST['t2'];
	$n=$_REQUEST['t3'];
	if((int)$a<(int)$b){
		mysqli_query($con,"UPDATE `exam_sl` SET `f_time`='".$a."',`t_time`='".$b."' WHERE `slot_no`='".$n."'");
		echo "Updated Successfully";
	}
	else{
		echo "Enter a valid time range";
	}
}elseif(isset($_REQUEST['n3'])){
	$a=$_REQUEST['t1'];
	$b=$_REQUEST['r1'];
	if($b=='Y'){
		mysqli_query($con,"DELETE FROM `exam_sl` WHERE `slot_no` = '".$a."'");
		echo "Deleted Successfully Successfully";
	}
	else{
		echo "Error";
	}
}elseif(isset($_REQUEST['b1'])){
	$r=mysqli_query($con,"SELECT * FROM `exam_sl`");
	$c=mysqli_num_rows($r);
?>
	<form method="post" action="">
		Starting Time : (in 24hrs)<input type="number" min="00" max="23" placeholder="0" name="t1"><br><br>
		Ending Time : (in 24hrs)<input type="number" min="00" max="23" placeholder="0" name="t2"><br><br>
		<input type="submit" name="n1">
	</form>
<?php
}elseif(isset($_REQUEST["b2"])){
	$a=$_REQUEST["b2"];
	$r=mysqli_query($con,"SELECT * FROM `exam_sl` WHERE `slot_no`='".$a."'");
	$row=mysqli_fetch_array($r);
?>
	<form method="post" action="">
		Starting Time for the day: (in 24hrs)<input type="number" min="00" max="21" value="<?php echo $row[1] ?>" name="t1"><br><br>
		Ending Time for the day : (in 24hrs)<input type="number" min="00" max="21" value="<?php echo $row[2] ?>" name="t2">
		<input type="text" name="t3" value="<?php echo $a ?>" hidden>
		<br><br>
		<input type="submit" name="n2">
	</form>
<?php
}elseif(isset($_REQUEST["b3"])){
	$a=$_REQUEST["b3"];
	$r=mysqli_query($con,"SELECT * FROM `exam_sl` WHERE `slot_no`='".$a."'");
	$row=mysqli_fetch_array($r);
?>
	<form method="post" action="">
		<input type="text" name="t1" value="<?php echo $a ?>" hidden>
		Are you sure ,you want to delete this slot ?<br>
		<input type="radio" name="r1" value="Y">Yes<br>
		<input type="radio" name="r1" value="N">No<br>
		<input type="submit" name="n3">
	</form>
<?php
}

?>