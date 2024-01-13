<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Home</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
	require("connectDB.php");
	session_start();
?>
<script>
		
<?php
	$result2=mysqli_query($con,"SELECT * FROM `paper` WHERE `P_CODE`= '".$_SESSION['op']."'");
	$row2=mysqli_fetch_array($result2);
	$time=$row2[4];
	$ct=date("i")+$time;
	$s=date("s");
?>

var countDownDate = new Date("<?php echo date("M")." ".date("j").", ".date("Y") ?>, <?php echo date("H").":".$ct.":".$s ?>").getTime();
		
var x = setInterval(function() {
  var now = new Date().getTime();

	var distance = countDownDate - now;
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
//
  document.getElementById("demo").innerHTML =  minutes + "m " + seconds + "s ";
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "Time Over";
	  document.myForm.submit();
  }
}, 1000);
</script>

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
	Time Left: <p id="demo"></p> 
	<?php 
					$paper=$_SESSION['op'];
$result=mysqli_query($con,"SELECT * FROM `question` WHERE `Paper Code`= '".$paper."'");
$_SESSION['q1']=1;
?>
<form method="post" action="checkP.php" name="myForm">
<?php
while($row=mysqli_fetch_array($result)){
	$q=$row[1];
	$op1=$row[2];
	$op2=$row[3];
	$op3=$row[4];
	$op4=$row[5];
	echo "<br>Question: ".$q."<br>";
	?>
	<input type="radio" name="r<?php echo $_SESSION['q1'] ?>" value="Option1">Option 1: <?php echo $op1 ?><br>
	<input type="radio" name="r<?php echo $_SESSION['q1'] ?>" value="Option2">Option 2: <?php echo $op2 ?><br>
	<input type="radio" name="r<?php echo $_SESSION['q1'] ?>" value="Option3">Option 3: <?php echo $op3 ?><br>
	<input type="radio" name="r<?php echo $_SESSION['q1'] ?>" value="Option4">Option 4: <?php echo $op4 ?><br>
	<input type="radio" name="r<?php echo $_SESSION['q1'] ?>" value="0" hidden="" checked="checked"><br>
<?php
$_SESSION['q1']=$_SESSION['q1']+1;
}
?>
	<br>
	<input type="submit" value="Submit" name="b1">
</form>
	</div>
</body>
</html>

