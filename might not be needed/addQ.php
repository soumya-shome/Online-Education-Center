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
	if(isset($_REQUEST['b1'])){
		$_SESSION['s2']=$_REQUEST['s1'];
	}
		trim($_SESSION['s2']);
		$r=mysqli_query($con,"SELECT * FROM `paper` WHERE `p_code`='".$_SESSION['s2']."'");
		$n1=mysqli_num_rows($r);
		$row=mysqli_fetch_array($r);
		$r2=mysqli_query($con,"SELECT * FROM `question` WHERE `Paper Code`='".$_SESSION['s2']."'");
		$n2=mysqli_num_rows($r2);
		$row2=mysqli_fetch_array($r2);
		$noQ=$row[5];
		if($noQ!=$n2){
			//echo "Can Enter new Questions";
			$_SESSION['nq']=$n2+1;
			echo "Question No. :".$_SESSION['nq'];
			
			?>
			<form name="f1" method="post" action="addQ2.php">
				Question : <input type="text" name="q" placeholder="Enter Question" ><br>
				Option 1 : <input type="text" name="o1" placeholder="Enter Option 1" ><br>
				Option 2 : <input type="text" name="o2" placeholder="Enter Option 2" ><br>
				Option 3 : <input type="text" name="o3" placeholder="Enter Option 3" ><br>
				Option 4 : <input type="text" name="o4" placeholder="Enter Option 4" ><br>
				Correct Option :(1/2/3/4) <input type="number" max="4" min="1" name="co" placeholder="Enter Correct Optiom" ><br>
				
				<input type="submit" name="b1" value="Add">
			</form>
	<?php
		}
		else{
			echo "<h1>All Questions Entered<h1>";
		}
	?>
</div>
	
</body>
</html>
