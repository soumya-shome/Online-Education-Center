<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<?php
	session_start();
	require("connectDB.php");
	$r=mysql_query("SELECT * FROM `paper` WHERE `P_NAME`='".$_REQUEST['s1']."'");
?>
	<form name="f1" method="post" action="displayQ.php">
	Select Paper <select name="s1">
	<?php
		while($row=mysql_fetch_array($r))
		{
			$pcode=$row[0];
			
	?>
		<option value='<?php  echo $pcode ?>'><?php echo $pcode?></option>
	<?php
		}
	?>
	</select>
	<input type="submit" name="b1" value="Search">
</form>
<body>
</body>
</html>