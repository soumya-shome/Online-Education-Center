<?php
require "header bar.php";
?>
<div class="container-fluid">
<?php
	if(isset($_REQUEST['b1'])){
		$_SESSION['s1'] =$_REQUEST['s1'];
		$s="SELECT * FROM `exam` WHERE `e_id`='".$_SESSION['s1']."'";	
		$r=mysqli_query($con,$s);
		$row=mysqli_fetch_array($r);
		echo "Exam Code :".$_SESSION['s1']."<br>";
		echo "Student ID :".$row[3]."<br>";
		echo "Course ID :".$row[4]."<br>";
	?>
	<form action="sche2.php" method="post">
		<input type="submit" name="b1" value="Schedule">
	</form>
	<?php
	}else{
		$s="SELECT * FROM `exam` WHERE `status`='Applied'";	
		$r=mysqli_query($con,$s);
		$count=mysqli_num_rows($r);
		if($count>0){
	?>
			<form name="f1" method="post" action="">
				Select Exam ID : <select name="s1">
			<?php
				while($row=mysqli_fetch_array($r))
				{
					$ei=$row[0];
			?>
					<option value='<?php  echo $ei ?>'><?php echo $ei?></option>
			<?php
				}
			?>
				</select>
				<input type="submit" name="b1" value="Search">
			</form>
			<?php
		}
		else{
			echo "No Exam to Schedule";
		}
	}
	?>
	
</div>
</body>
</html>
