<?php
require("header bar.php");
?>
<div class="container-fluid">
<?php
if(isset($_REQUEST['b1'])){
 	$r1=mysqli_query($con,"SELECT * FROM `student`");
	$count1=mysqli_num_rows($r1);
	$stid="ST".(1001+$count1);
	$a=$_REQUEST['fname'];
	$b=$_REQUEST['lname'];
	$g=$_REQUEST['gender'];
	
	$em=$_REQUEST['email1'];
	$d1=$_REQUEST['date1'];
	$d1 = date("d-m-Y", strtotime($d1));
	$e=explode('-',$d1);
	$doa=$e[2]."-".$e[1]."-".$e[0];
	echo $doa;
	$ph=$_REQUEST['phone'];
	$ph2=$_REQUEST['phone2'];
	$r2=mysqli_query($con,"INSERT INTO `student`(`s_id`, `f_name`, `l_name`, `gender`, `email`, `ph_no`, `ph_no_2`, `d_o_a`) VALUES ('".$stid."','".$a."','".$b."','".$g."','".$em."','".$ph."','".$ph2."','".$doa."')");
	if($r2){
		echo "<h3>Student Registered Successfully";
	}
	else{
		echo "<h2>Registration Failed. Please Check the Details.";	
	}
	unset($_REQUEST['b1']);
}
else{
	header("Location:Register.php");
}
?>
</div>
</body>
</html>