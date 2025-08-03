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

<body>
<nav class="nav navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header" style="padding-top: 8px">
			<a  href="#"><img ></a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mymenu">
			    	<span class="icon-bar"></span>         
					<span class="icon-bar"></span>     
					<span class="icon-bar"></span>    
				</button>
		</div>
		<div class="collapse navbar-collapse" id="mymenu">
			<ul class="nav navbar-nav">
				<li><a href="Home.php">Home</a></li>
				<li><a href="#">Attendance Log</a></li>
				<li class="active"><a href="Register.php">Register</a></li>
				<li><a href="#">Information</a></li>
				<li><a href="#">Settings</a></li>
			</ul>
		<div class="nav navbar-nav">
			
		</div>
		<ul class="nav navbar-nav navbar-right">
			<li>
				<form class="form-inline" style="padding-top: 8px">
				<div class="form-group">
				<input type="search" name="search" id="Search" placeholder="Search" class="form-control" s>
				<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
				</div>
				</form>
			</li>
			
			<li class="dropdown" ><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in">	</span>&nbsp;Login</a>
			<ul class="dropdown-menu">
				<li ><a href="#" data-toggle="modal" data-target="#myLogin">Admin</a></li>
				<li ><a href="#" data-toggle="modal" data-target="#myLogin">Student</a></li>
			</ul>
		</li>
		</ul>
		</div>
	</div>	
</nav> 
<div class="row" style="padding-left: 8px">
	<div class="col-md-1">&nbsp;</div>
	<div class="col-md-2" style="flex-wrap: wrap">
		<form name="r1" class="form-horizontal" method="post" onSubmit="validate()">
			First Name<input type="text" name="nam" placeholder="Enter First Name">
			</br>Last Name<input type="text" name="nam" placeholder="Enter Last Name" >
			Gender<input type="radio" name="r1">Male <input type="radio" name="r1">Female <input type="radio" name="r1">Others
			Date of Birth<input type="date" name="dob" >
		<p>Address</p>
		<textarea rows="3" name="address" placeholder="Enter Address"></textarea>
		<p>Email-ID</p>
		<input type="email" name="mail" placeholder="Enter Email" >
		<p>Phone-No</p>
		<input type="number" maxlength="10" placeholder="Enter Phone number">
		<p>Secondary Phone-No (optional)</p>
		<input type="number" maxlength="10" placeholder="Enter Phone number">
		<p>Card ID</p>
		<input type="text" placeholder="Enter Card ID"><input type="button" name="uid" value="Get U">
		<p>Course</p>
		<select name="course" >
			<option value="0">---Select Course---</option>
				<optgroup label="School">
					<option value="1">Class 8</option>
					<option value="2">Class 9</option>
					<option value="3">Class 10</option>
					<option value="4">Class 11</option>
					<option value="5">Class 12</option>
				</optgroup>
				<optgroup label="Professional">
					<option value="6">Web Designing</option>
					<option value="7">Data base</option>
					<option value="8">MultiMedia</option>
				</optgroup>
		</select>
		
		<br><br><input type="submit" name="b1">
		<input type="reset" value="Clear">
		</form>
	</div>
</div>
<div class="modal fade" role="dialog" id="myLogin">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button class="close" data-dismiss="modal">&times;</button>
							<h3 class="modal-title">Login</h3>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" action="/action_page.php">   
						<div class="form-group">     
							<label class="control-label col-sm-2" for="email">Email:</label>     
							<div class="col-sm-10">       
								<input type="email" class="form-control" id="email" placeholder="Enter email">     
							</div>   
						</div>   
						<div class="form-group">     
							<label class="control-label col-sm-2" for="pwd">Password:</label>     
							<div class="col-sm-10">        
								<input type="password" class="form-control" id="pwd" placeholder="Enter password">     
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
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">Close</button>	
					</div>
				</div>
				</div>
			</div>
</body>
</html>