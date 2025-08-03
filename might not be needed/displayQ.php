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
						<li class="active"><a href="viewCourse.php">View Question Paper</a></li>
						<li ><a href="#">Add Questions</a></li>
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
	$count=NULL;
	if(isset($_REQUEST['s1'])){
		$_SESSION['code']=$_REQUEST['s1'];
		$result=mysqli_query($con,"SELECT * FROM `question` WHERE `Paper Code`='".$_SESSION['code']."'");
		if($result)
			$count=mysqli_num_rows($result);
		
		if($count!=0){
?>
		<h1>Questions</h1>
		<table border="1">
			<tr>
				<th>Question No.</th>
				<th>Question</th>
				<th>Option 1</th>
				<th>Option 2</th>
				<th>Option 3</th>
				<th>Option 4</th>
				<th>Correct Option</th>
			</tr>
<?php 
			while($row=mysqli_fetch_array($result))
			{
				$quen=$row[1];
				$ques=$row[2];
				$op1=$row[3];
				$op2=$row[4];
				$op3=$row[5];
				$op4=$row[6];
				$opc=$row[7];
			?>
			<tr>
				<td><?php echo $quen ?></td>
				<td><?php echo $ques ?></td>
				<td><?php echo $op1 ?></td>
				<td><?php echo $op2 ?></td>
				<td><?php echo $op3 ?></td>
				<td><?php echo $op4 ?></td>
				<td><?php echo $opc ?></td>
			</tr>
			<?php
			}
			
			?>
			<form >
			<input type="submit" value="Edit">
			
			</form>
			<?php
		}
		else{
			echo "<h3>No Question/s Available</h3>";
		}
		?>
		</table>
	<?php
	}
	else{
		header("Location:viewCourse.php");
	}
	
	?>
</div>
	
</body>
</html>
