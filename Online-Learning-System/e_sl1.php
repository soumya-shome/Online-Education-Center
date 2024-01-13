<?php
require("header bar.php");
?>
<?php
if(isset($_REQUEST['n1'])){
	$a=$_REQUEST['t1'];
	$b=$_REQUEST['t2'];
	$c=$_REQUEST['t3'];
	$d=$a+$c;
	$n=1;
	mysqli_query($con,"INSERT INTO `exam_sl`(`slot_no`, `f_time`, `t_time`) VALUES ('".$n."','".$a."','".$d."')");
	if((int)$a<(int)$b){
		for($i=$d+$c;$i<=$b;$i=$i+$c){
			$n=$n+1;
			//echo $d." to ".$i."<br>";
			mysqli_query($con,"INSERT INTO `exam_sl`(`slot_no`, `f_time`, `t_time`) VALUES ('".$n."','".$d."','".$i."')");
			$d=$i;
			
		}
		echo "Inserted Successfully";
	}
	else{
		echo "Enter a valid time range";
	}
}
elseif(isset($_REQUEST['n2'])){
	$a=$_REQUEST['t1'];
	$b=$_REQUEST['t2'];
	$c=$_REQUEST['t3'];
	//echo $a."-".$b."-".$c."<br>";
	$d=$a+$c;
	$n=1;
	mysqli_query($con,"DELETE FROM `exam_sl`");
	mysqli_query($con,"INSERT INTO `exam_sl`(`slot_no`, `f_time`, `t_time`) VALUES ('".$n."','".$a."','".$d."')");
	if((int)$a<(int)$b){
		for($i=$d+$c;$i<=$b;$i=$i+$c){
			$n=$n+1;
			//echo $d." to ".$i."<br>";
			mysqli_query($con,"INSERT INTO `exam_sl`(`slot_no`, `f_time`, `t_time`) VALUES ('".$n."','".$d."','".$i."')");
			$d=$i;
			
		}
		echo "Slot Updated Successfully";
	}
	else{
		echo "Enter a valid time range";
	}
}
elseif(isset($_REQUEST['n3'])){
	$a=$_REQUEST['t1'];
	$b=$_REQUEST['r1'];
	if($b=='Y'){
		mysqli_query($con,"DELETE FROM `exam_sl` WHERE `slot_no` = '".$a."'");
		echo "Deleted Successfully Successfully";
	}
	else{
		echo "heading back";
	}
}
elseif(isset($_REQUEST['b1'])){
	$r=mysqli_query($con,"SELECT * FROM `exam_sl`");
	$c=mysqli_num_rows($r);
?>
	<form method="post" action="">
		Starting Time for the day: (in 24hrs)<input type="number" min="00" max="21" placeholder="0" name="t1"><br><br>
		Ending Time for the day : (in 24hrs)<input type="number" min="00" max="21" placeholder="0" name="t2"><br><br>
		Slot Interval (in hrs) : <input type="number" min="1" max="4" placeholder="1" name="t3"><br><br>
		<input type="submit" name="n1">
	</form>
<?php
}
elseif(isset($_REQUEST["b2"])){
	$a=$_REQUEST["b2"];
	echo $a;
	$r=mysqli_query($con,"SELECT * FROM `exam_sl` WHERE `slot_no`='".$a."'");
	$row=mysqli_fetch_array($r);
?>
	<form method="post" action="">
		Starting Time for the day: (in 24hrs)<input type="number" min="00" max="21"  name="t1"><br><br>
		Ending Time for the day : (in 24hrs)<input type="number" min="00" max="21" value="<?php echo $row[1] ?>" name="t2"><br><br>
		Slot Interval (in hrs) : <input type="number" min="1" max="4" placeholder="1" name="t3"><br><br>
		<input type="submit" name="n2">
	</form>
<?php
}
elseif(isset($_REQUEST["b3"])){
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