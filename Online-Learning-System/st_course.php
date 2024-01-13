<?php
require "header bar.php";
?>
<div class="container-fluid">
Register Student for Course:
<?php
	if(isset($_REQUEST['b1'])){
		$sid=$_REQUEST['t1'];
		$r=mysqli_query($con,"SELECT * from `course` WHERE `name`!=''");
		$c=mysqli_num_rows($r);
		if($c>0){
		?>
			<form method="post" action="">
				<input type="text" name="t2" value="<?php echo $sid ?>" hidden>
				Select Student ID : <select name="t1">
		<?php	
				while($row=mysqli_fetch_array($r)){
		?>
					<option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
		<?php
				}
		?>
				</select><br><br>
				<input type="submit" name="b2" value="Enter">
			</form>
		<?php
		}else{
			echo "No Course is available";
		}
	}else if(isset($_REQUEST['b2'])){
		$s_id=$_REQUEST['t2'];
		$c_id=$_REQUEST['t1'];
		$da=date("d-m-Y");
		$r=mysqli_query($con,"INSERT INTO `st_course`(`st_id`, `c_id`, `d_o_c`, `status`) VALUES ('".$s_id."','".$c_id."','".$da."','INCOMPLETE')");
		if($r){
			echo "Registered Successfully";
		}else{
			echo "Error !! Try Again Later";
		}
	}else{
		$r=mysqli_query($con,"SELECT `s_id` from `student` WHERE `f_name`!=''");
		$c=mysqli_num_rows($r);
		if($c>0){
		?>
			
			<form method="post" action="">
				Select Student ID : <select name="t1">
				<?php	
				while($row=mysqli_fetch_array($r)){
			?><option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
			<?php
		}
			?></select>
				<br><br>
				<input type="submit" name="b1" value="Enter">
			</form>
		<?php
		}else{
			echo "No Student is registered";
		}
	}
?>
</div>
</body>
</html>