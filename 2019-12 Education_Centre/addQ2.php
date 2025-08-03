<!doctype html>
<html>
<head>
<title>Exam Centre</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<?php
	require("connectDB.php");
	session_start();
?>
</head>
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
				
				<li class="#"><a href="adminHome.php">Home</a></li>
				<li class="#"><a href="Profile.php">Profile</a></li>
				<li class="dropdown active" ><a href="#" class="dropdown-toggle" data-toggle="dropdown">Exam Center<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Question Paper</li>
						<li ><a href="viewCourse.php">View Question Paper</a></li>
						<li class="active"><a href="#">Add Questions</a></li>
						<li ><a href="#">Add Question Set</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Exams</li>
						<li ><a href="#">Schedule Exam</a></li>
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
	if(isset($_REQUEST['y'])){
		
		header("Refresh:0,URL=addQ.php");
	}
	elseif(isset($_REQUEST['n'])){
		header("Refresh:0,URL=adminHome.php");
	}
	else{
		$q=$_REQUEST['q'];
		$o1=$_REQUEST['o1'];
		$o2=$_REQUEST['o2'];
		$o3=$_REQUEST['o3'];
		$o4=$_REQUEST['o4'];
		$co="Option".$_REQUEST['co'];
		$s="INSERT INTO `question`(`Q.No.`, `Question`, `Option1`, `Option2`, `Option3`, `Option4`, `Correct Answer`, `Paper Code`) VALUES ('".$_SESSION['nq']."','".$q."','".$o1."','".$o2."','".$o3."','".$o4."','".$co."','".$_SESSION['s2']."')";
		$q1=mysqli_query($con,$s);
		if($q1)
		{
			echo  "<h4>Inserted Successfully</h4>";
		}
		else{
			echo  "<h4>Insertion Unsuccessfully</h4>";
		}
	echo "<br>Enter New Question ?"
	
?>
	
</div>
	<form method="post" action="">
		<value="<?php echo $_SESSION['s2'] ?>" name="s1">
		<input type="submit" name="y" value="Yes">
		<input type="submit" name="n" value="No"><br>
	</form>
	<?php
	}
		?>
</body>
</html>
