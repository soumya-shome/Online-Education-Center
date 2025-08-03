<?php
require "header bar.php";
?>
<div class="container-fluid">
Register Student for Course:
<?php
	if(isset($_REQUEST['b1'])){
		$s_id=$_REQUEST['t1'];
		$c_id=$_REQUEST['t2'];
		$da=$_REQUEST['t3'];
		$da = date("d-m-Y", strtotime($da));
		
		$r1=mysqli_query($con,"SELECT `status` FROM `st_course` WHERE `st_id`='".$s_id."' AND `c_id`='".$c_id."'");
		$c1=mysqli_num_rows($r1);
		if($c1>0){
			$row=mysqli_fetch_array($r1);
			if($row[0]=="COMPLETED" ){
				
			}
		}
		
		$r=mysqli_query($con,"INSERT INTO `st_course`(`st_id`, `c_id`, `d_o_c`, `status`) VALUES ('".$s_id."','".$c_id."','".$da."','INCOMPLETE')");
		if($r){
			echo "Registered Successfully";
		}else{
			echo "Error !! Try Again Later";
		}
	}else{
		
		
		$r=mysqli_query($con,"SELECT `s_id` from `student` WHERE `f_name`!=''");
		$c=mysqli_num_rows($r);
		$r2=mysqli_query($con,"SELECT * from `course` WHERE `name`!=''");
		$c2=mysqli_num_rows($r2);
		?>
	<form method="post" action="">
				Select Student ID : <select name="t1">
		<?php
			if($c>0){	
				while($row=mysqli_fetch_array($r)){
		?>
					<option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option><?php
				}
			?>
				</select>
				<br><br>
		<?php
				if($c2>0){
		?>
				Select Course ID : <select name="t2">
		<?php	
				while($row=mysqli_fetch_array($r2)){
		?>
					<option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
		<?php
				}
		?>
				</select>
		
		<?php
					}else{
			echo "No Course is available";
		}
					
					?><br><br>
				<input type="date" name="t3" required>
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