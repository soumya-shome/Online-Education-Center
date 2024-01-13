<?php
require("header bar.php");
?>
	
	<?php 
	$r1=mysqli_query($con,"SELECT * FROM `course`");
	$c1=mysqli_num_rows($r1);
	$cid="C".(1001+$c1);
	
	?>
	
	
<form action="regCourse.php" enctype="multipart/form-data" method="post">
	Course ID: <input type="text" name="t0" value="<?php echo $cid ?>" readonly ><br>
	Course Name:<input type="text" name="t1" placeholder="Course Name"><br><br>
	Duration: <input type="number" name="t2" min='0' max='12' value='0'>Months<input type="number" name="t3" min='0' max='24' value='0'>Hrs<br><br>Description: <div>
	<textarea id="text" cols="40" rows="4" name="t4" placeholder="Say something..."></textarea></div>
	<input id="file" name="t5" type="file"><br>
	<input id="Submit" name="b1" type="submit" value="Submit">
</form>
</body>
</html>