<!doctype html>
<html>
<head>
<title>Home</title>
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
	$w=0;
	require("connectDB.php");
	if(isset($_REQUEST["b1"])){
		$stid=$_REQUEST["t1"];
		
		$r=mysqli_query($con,"SELECT * FROM `student` WHERE `ST_ID`='".$stid."'");
		if($count=mysqli_num_rows($r)>0)
		{
			$row=mysqli_fetch_array($r);	
			if($row[0]==$stid)	
			{
				$pass=$_POST["t2"];
				$pass2=$_POST["t3"];
				$ques=$_POST["t4"];
				$ans=$_POST["t5"];
				if($pass==$pass2){	
					$q="INSERT INTO `profile`(`USER_ID`, `PASSWORD`, `USER_TYPE`, `STATUS`, `HINT QUESTION`, `HINT ANSWER`) VALUES ('".$stid."','".$pass."','STUDENT','0','".$ques."','".$ans."')";
					$r=mysqli_query($con,$q);
					if(!$r)
					{
						echo "Record insertion failed!";
					}
					else
					{
						$w=$w+1;
					}
				}
			}
		}
	}
	else{
		header("Refresh:0,URL=Home.php");
	}
	?>
<body>
<div class="row">
<div class="col-md-12"><img src="Images/carousel-banner-2.jpg" alt="" width="1000"></div>
</div>

<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mySHome">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">Examco.in</a></div>
<div class="collapse navbar-collapse" id="mySHome"> 
<ul class="nav navbar-nav">
<li class="active"><a href="Home.php">Home</a></li>
</ul>
	
<ul class="nav navbar-nav navbar-right">
<li><a href="#" data-target="#mymodal" data-toggle="modal"><span class="glyphicon glyphicon-log-in" ></span>&nbsp;Log In</a></li>
</ul>
	<ul class="nav navbar-nav navbar-right">
<li><a href="#" data-target="#mymodal2" data-toggle="modal"><span class="glyphicon glyphicon-user" ></span>&nbsp;Sign Up</a></li>
</ul>
</div>
	
	<div>
	
		
	
	</div>

</div>
</nav>
	
	<?php
			if($w===0){
				echo "Student Not Found";
			}
		else{
			echo "Sign Up Successfull";
		}
		?>
	
	
	<div class="container-fluid">
<div id="myslide" class="carousel slide" data-ride="carousel">

<div class="carousel-inner">

<div class="item active">
<img src="Images/home-carousel-28.jpg" alt="Carousal" class="img-responsive">
</div>


<div class="item">
<img src="Images/home-carousel-11.jpg" alt="Carousal" class="img-responsive">
</div>


<a class="left carousel-control " href="#myslide" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
</a>
<a class="right carousel-control " href="#myslide" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
</a>
</div>
</div>
</div>
	
<div id="mymodal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="modal-title">Log In</h2>
			</div>
			<div class="modal-body">
				<p><h4><b>Welcome&nbsp;!</b></h4></p>
			
				<form class="form-horizontal" action="Login.php" method="post">   
					<div class="form-group">     
						<label class="control-label col-sm-3" for="id">Student ID:</label>     
						<div class="col-sm-9">       
							<input type="text" class="form-control" id="id" name="t1" placeholder="Enter Username">     
						</div>   
					</div>   
					<div class="form-group">     
						<label class="control-label col-sm-3" for="pwd">Password:</label>     
						<div class="col-sm-9">        
							<input type="password" class="form-control" id="pwd" name="p1" placeholder="Enter Password">     
						</div>   
					</div>     
					<div class="form-group">      
						<div class="col-sm-offset-2 col-sm-10">      
							<input type="submit" class="btn btn-default" name="b1" value="Log-in">  
						</div>   
					</div> 
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-info " type="button" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
	
<div id="mymodal2" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h2 class="modal-title">Sign Up</h2>
			</div>
			<div class="modal-body">
				<p><h4><b>Enter your details here&nbsp;:</b></h4></p><br>
				<form name="f1" class="form-horizontal" method="post" action="SignUp.php">
					<div class="form-group">     
						<label class="control-label col-sm-3" for="sId">Student ID</label>     
						<div class="col-sm-9">       
							<input type="text" class="form-control" id="sId" placeholder="Enter Student ID" name="t1" required>     
						</div>   
					</div>
					<div class="form-group">     
						<label class="control-label col-sm-3" for="pwd">Password</label>     
						<div class="col-sm-9">       
							<input type="text" class="form-control" id="pwd" name="t2" placeholder="Enter Password" required>     
						</div>   
					</div>
					<div class="form-group">     
						<label class="control-label col-sm-3" for="pwd2">Confirm Password</label>     
						<div class="col-sm-9">       
							<input type="text" class="form-control" id="pwd2" name="t3" placeholder="Enter Password" required>     
						</div>   
					</div>
					<div class="form-group">     
						<label class="control-label col-sm-3" for="hq">Hint Question</label>     
						<div class="col-sm-9">       
							<input type="text" class="form-control" id="hq" name="t4" placeholder="Enter Password" required>     
						</div>   
					</div>
					<div class="form-group">     
						<label class="control-label col-sm-3" for="ha">Answer</label>     
						<div class="col-sm-9">       
							<input type="text" class="form-control" id="ha" name="t5" placeholder="Enter Password" required>     
						</div>   
					</div>
					<div class="form-group">      
						<div class="col-sm-offset-2 col-sm-10">      
							<input type="reset" class="btn btn-default"></button>
							&nbsp;
							<input type="submit" class="btn btn-default" name="b1" value="Sign-up">
						</div>   
					</div> 
				</form>
			</div>
			<div class="modal-footer">
				<button class="btn btn-info " type="button" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
</body>
</html>