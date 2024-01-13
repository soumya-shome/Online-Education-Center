<?php
require "header bar2.php";
?>
	<div class="container-fluid">
	
	<?php
	$r=mysqli_query($con,"SELECT * FROM `exam` WHERE `st_id`='".$_SESSION['id']."' AND`status`='Incomplete';");
	$row=mysqli_fetch_array($r);
					if($row[0]!=''){
						echo "Exam Id: ".$row[0]."<br>";
						echo "Exam Date: ".$row[1]."<br>";
						echo "Exam Shift: ".$row[2]."<br>";
						echo "Student ID: ".$row[3]."<br>";
						echo "Course ID: ".$row[4]."<br>";
					}
					else
					{
						echo "<h3>Admit Card Unavailable</h3>";
					}
	
	?>
	
	</div>
</body>
</html>