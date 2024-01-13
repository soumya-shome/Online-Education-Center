<?php
require "header bar2.php";
$paper= $_SESSION['op'];
$r=mysqli_query($con,"SELECT * FROM `exam` WHERE `st_id`='".$_SESSION['id']."' AND `status`='INCOMPLETE';");
if(mysqli_num_rows($r)==0){
	header("Location:OE.php");
}
$row=mysqli_fetch_array($r);
$e_id=$row[0];
echo "<h1>Exam Complete</h1>";
mysqli_query($con,"UPDATE `exam` SET `status`='MARK' WHERE `e_id`='".$e_id."'");
?>
	</div>
</body>
</html>