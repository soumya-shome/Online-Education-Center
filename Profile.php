<?php
require("header bar.php");
?>
<?php
	$r=mysqli_query($con,"SELECT * FROM `Admin`");
	$a=mysqli_fetch_array($r);
?>
	
<div class="row container-fluid" >
	<div class="col-md-1">&nbsp;</div>
	<div class="col-md-5">
		<h3>User-Id: <?php echo $a[0]; ?></h3>
		<h3>Name: <?php echo $a[1]; ?></h3>
		<h3>Password: <?php echo $a[2]; ?></h3>
	</div>
</div>
	
	
</body>
</html>