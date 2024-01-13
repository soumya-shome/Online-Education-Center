<!doctype html>
<html>
<head>
<title>Admin Home Page</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
.navbar{
	border-radius:1;
	background-color: #03033C;
	}		
</style>
</head>
	
	<?php
	require("connectDB.php");
	session_start();
	?>
<body>
<div class="row">
	<div class="col-md-12"><img src="Images/carousel-banner-2.jpg" alt="" width="1000"></div>
</div>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myAHome">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Examco.in</a>
		</div>
		<div class="collapse navbar-collapse" id="myAHome"> 
			<ul class="nav navbar-nav">
				<li class="#"><a href="adminHome.php">Home</a></li>
				<li class="#"><a href="sche.php">Schedule Exam</a></li>
				<li class="active"><a href="e_details.php">Exam</a></li>
				<li class="#"><a href="Result.php">Result</a></li>
				<li class="#"><a href="createP.php">Create Question Set</a></li>
				<li class="#"><a href="viewCourse2.php">Add Questions</a></li>
				<li class="#"><a href="viewCourse.php">View Question Paper</a></li>
				<li class="#"><a href="#">Students</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right ">
				<li><a href="#">Welcome  <?php echo $_SESSION['id'] ?></a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="logOut.php"><span class="glyphicon glyphicon-log-out"></span>Log Out</a></li>
			</ul>
		</div>
		<div class="container-fluid">
			<div id="myslide" class="carousel slide" data-ride="carousel"></div>
		</div>
	</div>
</nav>
	

<div>
	<?php
	$q="SELECT * FROM `exam`" ;
	$result=mysqli_query($con,$q);
$count=mysqli_num_rows($result);
if($count!=0)
{
?>
<h1> EXAM details</h1>
<table border = '1'>
<tr>
	<th>Exam Code</th>
	<th>Exam Date</th>
	<th>Exam Slot</th>
	<th>Machine No.</th>
	<th>Student ID</th>
	<th>Course ID</th>
	<th>Paper Code</th>
	<th>Activation No.</th>
	<th>Satus</th>
</tr>
<?php
while($row=mysqli_fetch_array($result))
{

?>
	<tr>
	<td><?php echo $row[0]?></td>
	<td><?php echo $row[1]?></td>
	<td><?php echo $row[2]?></td>
	<td><?php echo $row[3]?></td>
	<td><?php echo $row[4]?></td>
	<td><?php echo $row[5]?></td>
	<td><?php echo $row[6]?></td>
	<td><?php echo $row[7]?></td>
	<td><?php echo $row[8]?></td>
		</tr>
	<?php
	}
}
else
{
	echo "Empty Table";
}
?>
</table>
	
</div>
	
	
	
</body>
</html>
