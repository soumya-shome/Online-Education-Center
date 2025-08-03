<?php
 require ("header bar.php");
?>
<div>
	<?php
$r=mysqli_query($con,"SELECT * FROM `course`");
?>
<form method="post" action="createP2.php">
	Select Course <select name="s1">
	<?php
		while($row=mysqli_fetch_array($r))
		{
			if($row[1]!=NULL){
	?>
		<option value='<?php  echo $row[0] ?>'><?php echo $row[1]?></option>
	<?php
		}
		}
	?>
	</select>
	<input type="submit" value="Select" name="b1">	
</form>	
</div>
	
</body>
</html>
