<?php
require "header bar2.php";
$paper= $_SESSION['op'];
$r=mysqli_query($con,"SELECT * FROM `exam` WHERE `st_id`='".$_SESSION['id']."' AND `status`='INCOMPLETE';");
$result=mysqli_query($con,"SELECT * FROM `question` WHERE `p_id`= '".$paper."'");
$r2=mysqli_query($con,"SELECT * FROM `p_on` WHERE `p_id`= '".$paper."'");

if(mysqli_num_rows($r)==0){
	header("Location:OE.php");
}

$row=mysqli_fetch_array($r);
$row2=mysqli_fetch_array($r2);

$b=array();
$e_id=$row[0];

for($i=1;$i<$_SESSION['q1'];$i+=1){
	$b[$i-1]=trim($_REQUEST['r'.$i]);
}

$qno=0;
$cq=0;
$wq=0;
$aq=0;

$time=$row2[2];
$nm=$row2[4];
$tot=$row2[5];
$m_p_q=$row2[6];
$j=0;
while($row3=mysqli_fetch_array($result)){
	$q=trim($row3[7]);
	$qno=$qno+1;
	if($b[$j]===$q){
		$cq=$cq+1;
		$aq=$aq+1;
	}elseif($b[$j]==0){
		$cq=$cq+0;
	}else{
		$wq=$wq+1;
		$aq=$aq+1;
	}
	$j=$j+1;
}

$n=$wq*$nm;
$tom=($cq*$m_p_q)-$n;
$grade='';
$stat="";
$pe=($tom/$tot)*100;

if ($pe>=90){
	$grade='A';
}
elseif ($pe<90 && $pe>=70){
	$grade='B';
}
elseif ($pe<70 && $pe>=50){
	$grade='C';
}
elseif ($pe<50 && $pe>=40){
	$grade='D';
}
else{
	$grade='F';
}
					
if($pe>=40)
	$stat="Pass";
else
	$stat="Fail";

echo "<h1>Exam Complete</h1>";
echo "Total Marks : ".$tot."<br>";
echo "Marks : ".$tom."<br>";
echo "PErcentage : ".$pe."<br>";
echo "Grade : ".$grade."<br>";
echo "The Student ".$stat."ed the Exam<br>";
$s="INSERT INTO `result`(`e_id`, `st_id`, `tot_q`, `tot_a_q`, `tot_w_q`, `tot_r_q`, `marks`, `n_marks`, `grade`, `percentage`, `status`) VALUES ('".$e_id."','".$_SESSION['id']."','".$qno."','".$aq."','".$wq."','".$cq."','".$tom."','".$n."','".$grade."','".$pe."','".$stat."')";
mysqli_query($con,$s);
mysqli_query($con,"UPDATE `exam` SET `status`='COMPLETE' WHERE `e_id`='".$e_id."'");
//echo "<br>UPDATE `exam` SET `status`='COMPLETE' WHERE `e_id`='".$e_id."'";
?>
	</div>
</body>
</html>