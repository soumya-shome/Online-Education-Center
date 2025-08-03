<?php
require "header bar2.php";
?>
<div>
<?php
	
	$q="SELECT * FROM `result` WHERE `st_id`='".$_SESSION['id']."'" ;
	$result=mysqli_query($con,$q);
$count=mysqli_num_rows($result);
if($count>0)
{
?>
<h1> EXAM REPORT</h1>
<table border = '1'>
	<thead>
		<tr>
			<th>Student name</th>
			<th>Exam Code</th>
			<th>Grade</th>
			<th>Percentage</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	
<?php
while($row=mysqli_fetch_array($result)){
?>
<tr>
	<td><?php echo $row[1]?></td>
	<td><?php echo $row[0]?></td>
	<td><?php echo $row[8]?></td>
	<td><?php echo $row[9]?></td>
	<td><?php echo $row[10]?></td>
</tr>
		<?php
	}	
		?>
		</tbody>
<?php

}
else
{
	echo "<h3>No Result is Available</h3>";
}
?>
</table>
	
</div>
	
</body>
</html>
