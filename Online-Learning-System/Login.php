<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<?php
	require("connectDB.php");
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
				
				<li class="active"><a href="adminHome.php">Home</a></li>
				<li class="#"><a href="sche.php">Check Attendance</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
				
				<li>
				<form class="form-inline" style="padding-top: 8px">
				<div class="form-group">
				<input type="search" name="search" id="Search" placeholder="Search" class="form-control" s>
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
				</div>
				</form>
				</li>
				<li><a href="#" data-target="#mymodal2" data-toggle="modal"><span class="glyphicon glyphicon-user" ></span>&nbsp;Sign Up</a></li>
				<li><a href="#" data-target="#mymodal" data-toggle="modal"><span class="glyphicon glyphicon-log-in" ></span>&nbsp;Log In</a></li>
			</ul>
		</div>
	</div>
</nav>

<div class="row" style="padding-left: 8px">
		<div class="col-md-8">
<?php
	if(isset($_REQUEST["b1"])){
		$login=$_REQUEST["t1"];
		$pass=$_REQUEST["p1"];
		$r=mysqli_query($con,"SELECT * FROM `profile` WHERE `USER_ID`='".$login."'");
		if($count=mysqli_num_rows($r) >0)
		{
			$row=mysqli_fetch_array($r);	
			if($pass==$row[1]){
				if($row[2]=="STUDENT")
				{
					session_start();
					$_SESSION['id']=$row[0];
					header("Refresh:0,URL=stuHome.php");	
				}
				else
				{
					session_start();
					$_SESSION['id']=$row[0];
					header("Refresh:0,URL=adminHome.php");
				}
			}
			else{
				echo "Wrong Password";
			}
		}
		else
		{
			echo "User Not Found";
		}
	}
?>
			<h1 class="page-header">Company Name</h1>
				<h1 class=" text-danger">Bootstrap</h1>
					<p class="text-justify text-capitalize">Build responsive, mobile-first projects on the web with the world’s most popular front-end component library. 
					Bootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.
					Build responsive, mobile-first projects on the web with the world’s most popular front-end component library. 
					Bootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery. 
					</p>
		</div>
		<div class="col-md-4">
			<div class="panel-group">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">Gallery</div>
					</div>
					<div class="panel-body">
						<div id="myslide" class="carousel slide" data-ride="carousel">
						<ul class="carousel-indicators">
						<li class="active" data-target="#myslide" data-slide-to="0"></li>
							<li  data-target="#myslide" data-slide-to="1"></li>
							<li  data-target="#myslide" data-slide-to="2"></li>
								<li  data-target="#myslide" data-slide-to="3"></li>
				</ul>
		<div class="carousel-inner" >
			<div class="item active">
			<img src="Images/img2.jpg" class="img-responsive">
		</div>
		<div class="item ">
				<img src="Images/img2.jpg" class="img-responsive">
		</div>
		<div class="item ">
				<img src="Images/img2.jpg" class="img-responsive">
		</div>
		<div class="item ">
				<img src="Images/img2.jpg" class="img-responsive">
		</div>
	</div>
		 <!-- Left and right controls -->   
		<a class="left carousel-control" href="#myslide" data-slide="prev">     
			<span class="glyphicon glyphicon-chevron-left"></span>     
			  </a>   
		<a class="right carousel-control" href="#myslide" data-slide="next">     
			<span class="glyphicon glyphicon-chevron-right"></span> 
		</a>
	</div>
					</div>
					<div class="panel-footer">		
						<h3>More...</h3>
					</div>
					</div>
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