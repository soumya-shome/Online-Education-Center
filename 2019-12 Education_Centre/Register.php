<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<script src="jquery-3.4.1.min.js"></script>
	<script>
		$(document).ready(function(){
		$("#Name1").blur(function(){
			if(document.f1.Name1.value==""){
				$("#Name1").css("border","red solid 1px")
				$("#u1").html("Enter First Name")
			}
			else{
				$("#Name1").css("border","#333 solid 1px")
				$("#u1").html("")
			}
		})
		
		$("#Name2").blur(function(){
			if(document.f1.Name2.value==""){
				
				$("#Name2").css("border","red solid 1px")
				$("#u2").html("Enter Last Name")
			}
			else{
				$("#Name1").css("border","#333 solid 1px")
				$("#u2").html("")
			}
		})
		
			
	})
	</script>
	
	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
				<li class="dropdown" ><a href="#" class="dropdown-toggle" data-toggle="dropdown">Exam Center<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">Question Paper</li>
						<li ><a href="viewCourse.php">View Question Paper</a></li>
						<li ><a href="viewCourse2.php">Add Questions</a></li>
						<li ><a href="createP.php">Add Question Set</a></li>
						<li class="divider"></li>
						<li class="dropdown-header">Exams</li>
						<li ><a href="sche.php">Schedule Exam</a></li>
						<li ><a href="Result.php">Result</a></li>
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
				<li class="dropdown active" ><a href="#" class="dropdown-toggle" data-toggle="dropdown">Students<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li class="dropdown-header">New Student</li>
						<li ><a href="Register.php">Register</a></li>
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
	
	<div class="row" style="padding-left: 2%">
		<div class="col-md-5">
			<h1 class="page-header">Registration</h1>
			<form name="f1" method="post" action="registerStu.php">
				<div class="form-group row">
				<label for="Name1" class="col-sm-2 col-form-label">First Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="Name1" name="fname" placeholder="First Name"><span id="u1"></span>
				</div>
				
			</div>
				<div class="form-group row">
				<label for="Name2" class="col-sm-2 col-form-label">Last Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="Name2" name="lname" placeholder="Last Name"><span id="u2"></span>
				</div>
			</div>
			
			<fieldset class="form-group">
			<div class="row">
				<label for="gender" class="col-sm-2 col-form-label">Gender</label>
				<div class="col-sm-2">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" id="gender" value="M">
						<label class="form-check-label" for="male">Male</label>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" id="gender" value="F">
						<label class="form-check-label" for="female">Female</label>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" id="gender" value="O">
						<label class="form-check-label" for="others">Others</label>
					</div>
				</div>
				<div class="col-sm-2"><span id="u3"></span></div>
			</div>
			</fieldset>
				
			<div class="form-group row">
				<label for="Email1" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="email" class="form-control" id="Email1" name="email1" placeholder="Email">
				</div>
			</div>
			<!--
			<div class="form-group row">
				<label for="pass" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" name="pass" id="pass" placeholder="Password">
				</div>
			</div>
			
			<div class="form-group row" style="padding-left: 20%">
        		<input class="form-check-input" type="checkbox" id="gridCheck1">
        		<label class="form-check-label" for="gridCheck1">
          			Show Password
        		</label>
      		</div>
			-->	
			<div class="form-group row">
  				<label for="date1" class="col-sm-2 col-form-label">Date of Birth</label>
				<div class="col-sm-10">
    				<input class="form-control" type="date" name="date1"  id="date1">
  				</div>
			</div>
			
			<div class="form-group row">
  				<label for="course" class="col-sm-2 col-form-label">Course</label>
				<div class="col-sm-10">
    				<select id="course" name="course" class="form-control">
        			<option selected value="choose">Choose...</option>
        			<option>...</option>
      				</select>
  				</div>
			</div>
      				
			<div class="form-group row">
  				<label for="date1" class="col-sm-2 col-form-label">Date of Admission</label>
				<div class="col-sm-10">
    				<input class="form-control" type="date" name="date1"  id="date1">
  				</div>
			</div>
			<div class="form-group row">
  				<label for="phone" class="col-sm-2 col-form-label">Phone No.</label>
				<div class="col-sm-10">
    				<input class="form-control" type="tel" name="phone"  placeholder="Phone Number" id="phone">
  				</div>
			</div>
			
			<div class="form-group row">
  				<label for="phone2" class="col-sm-2 col-form-label">Phone No. (Secondary)</label>
				<div class="col-sm-10">
    				<input class="form-control" type="tel" name="phone2" placeholder="Phone Number" id="phone2">
  				</div>
			</div>
				<!--
			<div class="form-group row">
  				<label for="card" class="col-sm-2 col-form-label" disabled>Card No.</label>
				<div class="col-sm-8">
    				<input class="form-control" name="cardno" type="text" placeholder="Card No." id="cardno">
				</div>
				<div class="col-sm-2">
					<button class="btn btn-default" id="getcard">Get ID</button>
				</div>
			</div>
				-->
 			<div class="form-group row">
    			<div class="col-sm-10">
      			<button type="submit" class="btn btn-primary">Register</button>
    		</div>
  </div>
</form>
<div class="modal fade" role="dialog" id="myLogin">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h3 class="modal-title">Login</h3>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" action="login.php">   
					<div class="form-group">     
						<label class="control-label col-sm-2" for="email">Username:</label>     
						<div class="col-sm-10">       
							<input type="text" class="form-control" id="email" placeholder="Enter Username">     
						</div>   
					</div>   
					<div class="form-group">     
						<label class="control-label col-sm-2" for="pwd">Password:</label>     
						<div class="col-sm-10">        
							<input type="password" class="form-control" id="pwd" placeholder="Enter Password">     
						</div>   
					</div>   
					<div class="form-group">      
						<div class="col-sm-offset-2 col-sm-10">       
							<div class="checkbox">         
								<label><input type="checkbox"> Remember me</label> 
							</div>     
						</div>   
					</div>   
					<div class="form-group">      
						<div class="col-sm-offset-2 col-sm-10">      
							<button type="submit" class="btn btn-default">Submit</button>    
						</div>   
					</div> 
				</form>
			</div>
		</div>
	</div>		
</div>
</body>
</html>