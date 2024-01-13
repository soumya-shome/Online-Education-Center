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
<div class="container-fluid">
	
<?php
	$r=mysqli_query($con,"SELECT * FROM `exam` WHERE `Student Id`='".$_SESSION['id']."' AND`Exam Status`='Incomplete';");
	$row=mysqli_fetch_array($r);
	
	$mon=substr($row[1],-5,-3);
	$day=substr($row[1],-2);			
	$stat=0;
	if(mysqli_num_rows($r)>0){		
		if($row[1]==date("Y-m-d")){
			if($row[2]=='M'){
				if(date("H")>=11 && date("H")<=13){
					$stat=1;
				}
				else{
					$stat=2;
				}
			}
			else{
				if(date("H")>=14 && date("H")<=16){
					$stat=1;
				}
				else{
					$stat=2;
				}
			}
		}
		else if(date("d")>$day && $mon>=date("m")) {
			$stat=2;
		}
		else if(date("d")<substr($row[1],-2) && $mon<=date("m")) {
			$stat=0;
		}

		if($stat==1){
			echo "Exam Id: ".$row[0]."<br>";
			echo "Exam Date: ".$row[1]."<br>";
			echo "Exam Shift: ".$row[2]."<br>";
			echo "Machine: ".$row[3]."<br>";
			echo "Student ID: ".$row[4]."<br>";
			echo "Course ID: ".$row[5]."<br>";
			echo $row[6]."<br>";
			$_SESSION['op']=$row[6];
		?>
			<form action="OnlineExam.php">
				<input type="submit" value="Start">
			</form>
		<?php
		}
		if($stat==2){
			echo "<h2>You missed your examination time.</h2>";
		}
		elseif($stat==0){
			echo "<h3>Your Exam is Scheduled on ".$row[1]."</h3>";
		}
	}
	else{
		$r2=mysqli_query($con,"SELECT * FROM `exam` WHERE `Student Id`='".$_SESSION['id']."'");
		$count=mysqli_num_rows($r);
		$count2=mysqli_num_rows($r2);
		$row1=mysqli_fetch_array($r2);
		if($row1[8]=="Applied"){
			echo "<h2>Your Exam is not Scheduled Yet</h2>";
		}
		else{
			if($count>0){
				echo "<h2>You Have Given the Exam</h2>";
			}
			else
			{
				echo "<h2>You Don't have any exam</h2>";
			}
		}
	}
?>
	</div>
</body>
</html>