<?php
require("header bar.php");
?>
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
<div class="container-fluid">
	<div class="row" style="padding-left: 2%">
		<div class="col-md-5">
			<h1 class="page-header">Registration</h1>
			<form method="post" action="registerStu.php">
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
 			<div class="form-group row">
    			<div class="col-sm-10">
      			<input name="b1" id="b1" type="submit" value="Register" class="btn btn-primary">
    		</div>
  </div>
			</form>
		</div>
	</div>
</div>
</body>
</html>