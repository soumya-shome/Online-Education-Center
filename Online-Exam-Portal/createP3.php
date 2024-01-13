<?php
 require ("header bar.php");
?>
<div>
<?php
	$type=$_REQUEST['t1'];
$re="INSERT INTO `paper_set`(`p_id`, `c_id`, `type`,`status`) VALUES ('".$_SESSION['pco']."','".$_SESSION['cc']."','".$_REQUEST['t1']."','INCOMPLETE')";
$t=mysqli_query($con,$re);
if($type=="OFFLINE"){
	$r2=mysqli_query($con,"INSERT INTO `p_off`(`p_id`, `c_id`, `file`, `tot_marks`,`time`) VALUES ('".$_SESSION['pco']."','".$_SESSION['cc']."','','','')");
}
elseif($type=="ONLINE"){
	$r2=mysqli_query($con,"INSERT INTO `p_on`(`p_id`, `c_id`, `time`, `no_of_q`, `ne_marks`, `tot_marks`, `p_q_marks`) VALUES ('".$_SESSION['pco']."','".$_SESSION['cc']."','','','','','')");
}
if($t && $r2){
	echo "Paper Set Created Successfully";
}
else{
	echo "There is Something Wrong . Please , Try Again !";
}
?>	
</div>
	
</body>
</html>
