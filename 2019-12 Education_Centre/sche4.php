<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Exam Centre</title>
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
				
				<li ><a href="adminHome.php">Home</a></li>
				<li class="#"><a href="Profile.php">Profile</a></li>
				<li class="dropdown" ><a href="#" class="dropdown-toggle" data-toggle="dropdown">Exam Center<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Question Paper</li>
						<li ><a href="viewCourse.php">View Question Paper</a></li>
						<li ><a href="viewCourse2.php">Add Questions</a></li>
						<li ><a href="createP.php">Add Question Set</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Exams</li>
						<li class="active"><a href="sche.php">Schedule Exam</a></li>
						<li ><a href="#">Result</a></li>
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
				<li class="dropdown" ><a href="#" class="dropdown-toggle" data-toggle="dropdown">Students<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">New Student</li>
						<li ><a href="#">Register</a></li>
						<li ><a href="#">Courses</a></li>
						
						<li class="divider"></li>
						<li class="dropdown-header">Details</li>
						<li ><a href="#">Edit Details</a></li>
						<li ><a href="#">View Details</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logOut.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li></li>
			</ul>
		<ul class="nav navbar-nav navbar-right ">
				<li><a href="#">Welcome  <?php echo "ADMIN" ?></a></li>
			</ul>
		</div>
	</div>
</nav>
	
<div>
<?php
	$_SESSION['s2']=$_REQUEST['n1'];
	$_SESSION['s3']=$_REQUEST['d'];
	$r=mysqli_query($con,"SELECT * FROM `exam` WHERE `Exam Code`='".$_SESSION['s1']."'");
	$row=mysqli_fetch_array($r);
					
	$r2=mysqli_query($con,"SELECT * FROM `paper` WHERE `C_ID`='".$row[5]."'");					
	$count=mysqli_num_rows($r2);	
	$c=substr($row[0],3,2);
	$co=strlen($row[5]);
	$q=$c.chr(64+(rand(1,$count)));
	$pcode="P10".$q;
	$r2=mysqli_query($con,"SELECT * FROM `paper` WHERE `C_ID`='".$row[5]."'");
	$s1="UPDATE `exam` SET `Exam Date`='".$_SESSION['s3']."',`Exam Slot`='".$_SESSION['s2']."',`Paper Code`='".$pcode."',`Exam Status`='Incomplete' WHERE `Exam Code`='".$_SESSION['s1']."'";
	mysqli_query($con,$s1);

	//$s2="INSERT INTO `machine_allotment`(`EXAM_DATE`, `EXAM_ALOT`, `MAC_NO`) VALUES ('".$_SESSION['s3']."','".$_SESSION['s2']."','".$_SESSION['s5']."')";
	//mysqli_query($con,$s2);
					
?>
	<h1>Scheduled Successfully</h1>
</div>
</body>
</html>
