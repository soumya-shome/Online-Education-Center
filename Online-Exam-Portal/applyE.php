<?php
require "header bar2.php";
?>
<?php 
	if(isset($_REQUEST['r1'])){
		$a=$_REQUEST['r1'];
		if($a=="Apply"){
			header("Refresh:0;URL=applyE2.php");
		}
		elseif($a=="ReApply"){
			header("Refresh:0;URL=ReApply.php");
		}
	}
	$s="SELECT * FROM `exam`";
	$r1=mysqli_query($con,$s);
	$count=mysqli_num_rows($r1);
	$_SESSION['eId']="E".($count+1001);
	$c=0;
	$d=0;
?>
<div>
<form method="post" action="">
<?php
	$r1=mysqli_query($con,"SELECT `status` FROM `exam` WHERE `st_id`='".$_SESSION['id']."'");
	$row=mysqli_fetch_array($r1);
	
	$r2=mysqli_query($con,"SELECT `status` FROM `result` WHERE `st_id`='".$_SESSION['id']."'");
	$row2=mysqli_fetch_array($r2);
	
	if($row2[0]=="Pass")
		$d=1;
	if(mysqli_num_rows($r1)>0){
		if($row[0]=="Complete"){
?>
			<input type="radio" value="Apply" name="r1">Apply for Exam<br>
<?php
			if($d==0){
?>
				<input type="radio" value="ReApply" name="r1">ReAppear for Exam
<?php
			}
		}
		else{
			echo "<h1>You Have Already Applied for Exam</h1>";	
			$c=1;
		}
	}
	else{
?>
		<input type="radio" value="Apply" name="r1">Apply for Exam<br>	
<?php
	}
	if ($c==0){
?>
		<input type="submit" value="Submit">
		</form>
<?php 
	}
?>
</div>
</body>
</html>