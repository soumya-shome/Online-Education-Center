<?php
require "header bar2.php";
?>
<div>
<?php 
	$r2=mysqli_query($con,"SELECT * FROM `st_course` WHERE `st_id`='".$_SESSION['id']."' AND `status`='EXAM' ");
	if(mysqli_num_rows($r2)>0){
		$row=mysqli_fetch_array($r2);
		$r=mysqli_query($con,"SELECT * FROM `course` WHERE `c_id`='".$row[1]."'");
		$row2=mysqli_fetch_array($r);
		echo "Exam ID : ".$_SESSION['eId']."<br>";
		echo "Course ID : ".$row2[0]."<br>";				
		echo "Course Name : ".$row2[1]."<br>";				
		$s="INSERT INTO `exam`(`e_id`, `e_date`, `e_slot`, `st_id`, `c_id`, `p_type`, `p_set`, `activation code`, `status`) VALUES ('".$_SESSION['eId']."','','','".$_SESSION['id']."','".$row2[0]."','','','','APPLIED')";
		//echo $s;
		$r4=mysqli_query($con,$s);
		if($r4)
			echo "<h3>Successfully Applied</h1>";
		else
			echo "<h3>Failed Try Again</h3>";
	}
	else{
		echo "<h3>You Dont have any course for Exam</h3>";
	}
	?>

	
	
	</div>
</body>
</html>