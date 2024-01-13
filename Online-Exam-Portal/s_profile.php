<?php
require "header bar2.php";
?>
<div class="container-fluid">
<?php
	$r=mysqli_query($con,"SELECT * FROM `student` WHERE `s_id`='".$_SESSION['id']."'");
	$row=mysqli_fetch_array($r);
	?>
	<b>First Name: </b><?php echo $row[1] ?><br>
	<b>Last Name: </b><?php echo $row[2] ?><br>
	<b>Student ID: </b><?php echo $row[0] ?><br>
	<b>Gender: </b><?php echo $row[3] ?><br>
	<b>Email: </b><?php echo $row[4] ?><br>
	<b>Phone no: </b><?php echo $row[5] ?><br>
	<b>2nd Phone no: </b><?php echo $row[6] ?><br>
	<b>Date of Admission: </b><?php echo $row[7] ?><br>
	<?
	
?>
</div>