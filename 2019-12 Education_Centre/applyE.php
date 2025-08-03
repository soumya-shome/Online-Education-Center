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
						<li ><a href="">Online Exam</a></li>
						<li class="active"><a href="p">Apply for Exam</a></li>
						<li ><a href="p">Admit Card</a></li>
						<li ><a href="p">Result</a></li>
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
<?php 
	$s="SELECT * FROM `exam`";
	$r1=mysqli_query($con,$s);
	$count=mysqli_num_rows($r1);
	$_SESSION['eId']="E".($count+1001);
	$c=0;
	$d=0;
?>
<div>
<form method="post" action="deci.php">
<?php
	$r1=mysqli_query($con,"SELECT `Exam Status` FROM `exam` WHERE `Student Id`='".$_SESSION['id']."'");
	$row=mysqli_fetch_array($r1);
	
	$r2=mysqli_query($con,"SELECT `Status` FROM `result` WHERE `Student Id`='".$_SESSION['id']."'");
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