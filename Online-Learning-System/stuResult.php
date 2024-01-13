<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Exam Center</title>
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
						<li ><a href="">Online Exam</a></li>
						<li ><a href="applyE.php">Apply for Exam</a></li>
						<li ><a href="">Admit Card</a></li>
						<li class="active"><a href="stuResult.php">Result</a></li>
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
	
	$q="SELECT * FROM `result` WHERE `Student Id`='".$_SESSION['id']."'" ;
	$result=mysqli_query($con,$q);
$count=mysqli_num_rows($result);
if($count>0)
{
?>
<h1> EXAM REPORT</h1>
<table border = '1'>
<tr>
<th>Student name</th>
<th>Exam Code</th>
<th>Grade</th>
<th>Percentage</th>
<th>Status</th>

</tr>
<?php
$row=mysqli_fetch_array($result);

$eCode=$row[0];
$sId=$row[1];
$pC=$row[7];
$grade=$row[8];
$status=$row[9];
?>
<tr>
<td><?php echo $sId?></td>
<td><?php echo $eCode?></td>
<td><?php echo $grade?></td>
<td><?php echo $pC?></td>
<td><?php echo $status?></td>
	</tr>
<?php

}
else
{
	echo "<h3>No Result is Available</h3>";
}
?>
</table>
	
</div>
	
</body>
</html>
