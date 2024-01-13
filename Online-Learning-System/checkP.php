<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
	require("connectDB.php");
	session_start();
?>
<body>
	
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myAHome">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Centre</a>
		</div>
		<div class="collapse navbar-collapse" id="myAHome">
			
			<ul class="nav navbar-nav">		
				
				<li ><a href="stuHome.php">Home</a></li>
				<li ><a href="">Profile</a></li>
				<li class="dropdown active" ><a href="#" class="dropdown-toggle" data-toggle="dropdown">Exam Center<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Exams</li>
						<li class="active"><a href="OE.php">Online Exam</a></li>
						<li ><a href="applyE.php">Apply for Exam</a></li>
						<li ><a href="admit.php">Admit Card</a></li>
						<li ><a href="stuResult.php">Result</a></li>
					</ul>
				</li>
				<li class="dropdown" ><a href="#" class="dropdown-toggle" data-toggle="dropdown">Attendance Register<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Register</li>
						<li ><a href="#">-</a></li>
						
						<li class="divider"></li>
						<li class="dropdown-header">Fees</li>
						<li ><a href="#">View</a></li>
						<li ><a href="#">Submit</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logOut.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li></li>
			</ul>
		<ul class="nav navbar-nav navbar-right ">
				<li><a href="#">Welcome  <?php echo $_SESSION['id'] ?></a></li>
			</ul>
		</div>
	</div>
</nav>
	<div>
	
	<?php
	$r=mysqli_query($con,"SELECT * FROM `exam` WHERE `Student Id`='".$_SESSION['id']."' AND`Exam Status`='Incomplete';");
	$row=mysqli_fetch_array($r);
$b=array();
for($i=1;$i<$_SESSION['q1'];$i+=1){
		$b[$i-1]=trim($_REQUEST['r'.$i]);
}
$paper= $_SESSION['op']  ;
$qno=0;
$cq=0;
$wq=0;
$result=mysqli_query($con,"SELECT * FROM `question` WHERE `Paper Code`= '".$paper."'");
$result2=mysqli_query($con,"SELECT * FROM `paper` WHERE `P_CODE`= '".$paper."'");
$row2=mysqli_fetch_array($result2);
					$time=$row2[4];
$nm=$row2[6];
$j=0;
while($row=mysqli_fetch_array($result)){
	$q=trim($row[6]);
	$qno=$qno+1;
	if($b[$j]===$q){
		$cq=$cq+1;
	}
	else if($b[$j]==0){
		$cq=$cq+0;
	}
	else{
		$wq=$wq+1;
	}
	$j=$j+1;
}
$tot=$qno*5;
$n=$wq*$nm;
$tom=($cq*5)-$n;
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
echo "Total Marks=".$tot."<br>";
echo "Marks=".$tom."<br>";
echo $pe."<br>";
echo "Grade : ".$grade."<br>";
echo "You have ".$stat."ed the Exam<br>";
$s="INSERT INTO `result`(`Exam Code`, `Student Id`, `Total no, of questions`, `No. of attempts`, `No. of wrong answers`, `No. of correct answers`, `Negative Marks`, `Percentage`, `GRADE`, `Status`) VALUES ('E1001','ST1001','".$qno."','".$qno."','".$wq."','".$cq."','".$n."','".$pe."','".$grade."','".$stat."')";
mysqli_query($con,$s);
mysqli_query($con,"UPDATE `exam` SET `Exam Status`='Complete' WHERE `Exam Code`='".$row[0]."'");
?>
	</div>
</body>
</html>