<?php
require "header bar.php";
?>
<div class="container-fluid">
<?php
	if(isset($_REQUEST['b1'])){
		$eid=$_REQUEST['t1'];
		$r=mysqli_query($con,"SELECT * FROM `exam` WHERE `e_id`='".$eid."'");	
		$row=mysqli_fetch_array($r);
	?>
		<form method="post" action="">
			<input type="text" name="t1" value="<?php echo $eid ?>" hidden>
			Full Marks: <input type="text" name="t2" required>
			Marks: <input type="text" name="t3" required>
			<input type="text" name="t4" value="<?php echo $row[3]?>" hidden>
			<input type="submit" name="b2">
	</form>
	<?php
	}elseif(isset($_REQUEST['b2'])){
		$grade='';
		$stat="";
		$eid=$_REQUEST['t1'];
		$sid=$_REQUEST['t4'];
		$tom=$_REQUEST['t3'];
		$tot=$_REQUEST['t2'];
		$pe=($tom/$tot)*100;
		if ($pe>=90)
			$grade='A';
		elseif ($pe<90 && $pe>=70)
			$grade='B';
		elseif ($pe<70 && $pe>=50)
			$grade='C';
		elseif ($pe<50 && $pe>=40)
			$grade='D';
		else
			$grade='F';
		if($pe>=40)
			$stat="Pass";
		else
			$stat="Fail";
		echo "Total Marks : ".$tot."<br>";
		echo "Marks : ".$tom."<br>";
		echo "Percentage : ".$pe."<br>";
		echo "Grade : ".$grade."<br>";
		echo "You have ".$stat."ed the Exam<br>";
		$s="INSERT INTO `result`(`e_id`, `st_id`, `tot_q`, `tot_a_q`, `tot_w_q`, `tot_r_q`, `marks`, `n_marks`, `grade`, `percentage`, `status`) VALUES ('".$eid."','".$sid."','-','-','-','-','-','-','".$grade."','".$pe."','".$stat."')";
		//echo $s;
		mysqli_query($con,$s);
		mysqli_query($con,"UPDATE `exam` SET `status`='COMPLETE' WHERE `e_id`='".$eid."'");	
	}else{
	?>
	<form method="post" action="">
<?php
	$r=mysqli_query($con,"SELECT * FROM `exam` WHERE `status` = 'MARK'");
	$c=mysqli_num_rows($r);
	if($c>0){
		?>
		Select Exam to mark : <select name="t1">
		<?php
			while ($row=mysqli_fetch_array($r)){
		?>
		<option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
		
		<?php
			}
		?>
		</select>
		<?php
	}
?><br>
	<input type="submit" name="b1">		
	</form>
	<?php
	}
		?>
</div>
	
</body>
</html>
