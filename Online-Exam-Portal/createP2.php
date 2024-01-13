<?php
 require ("header bar.php");
?>
<div>
	<?php
$_SESSION['cc']=$_REQUEST['s1'];
$r=mysqli_query($con,"SELECT * FROM `paper_set` WHERE `c_id`='".$_SESSION['cc']."'");
$r2=mysqli_query($con,"SELECT `name` FROM `course` WHERE `c_id`='".$_SESSION['cc']."'");
$row2=mysqli_fetch_array($r2);
$_SESSION['cname']=$row2[0];
$count2=mysqli_num_rows($r);
?>
<form method="post" action="createP3.php">
	<?php
		$row=mysqli_fetch_array($r);
		$ccode=$_SESSION['cc'];
		$c=substr($ccode,3,2);
		$co=strlen($ccode);
		$_SESSION['set']=chr(65+$count2);
		$_SESSION['pname']=$row[1];
		$_SESSION['pco']="P10".$c.chr(65+$count2);
		echo "Paper Name : ".$_SESSION['cname']."<br>";
		echo "Paper Code : ".$_SESSION['pco']."<br>";
		echo "Course ID : ".$_SESSION['cc']."<br>";
	?>
	Set No. : <?php echo $_SESSION['set']?><br>
	Type of Paper: <input type="radio" name="t1" value="OFFLINE" required>Offline<input type="radio" name="t1" value="ONLINE" required>Online<br>
	<br>
	<input type="submit" value="Select" name="b1">	
</form>	
</div>
	
</body>
</html>
