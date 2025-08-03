<?php
require "header bar.php";
?>
<div class="container-fluid">
<?php
	$q="SELECT * FROM `result`" ;
	$result=mysqli_query($con,$q);
$count=mysqli_num_rows($result);
if($count!=0)
{
?>
<h1> EXAM REPORT</h1>
<table border = '1'>
<tr>
<th>Student ID</th>
<th>Exam Code</th>
<th>Grade</th>
<th>Percentage</th>
<th>Status</th>
<th>Total Questions</th>
	<th>No of Attempts</th>
	<th>No of Correct Answers</th>
	<th>No of Wrong Answers</th>
	<th>Negative Marks</th>
	<th>Marks</th>
</tr>
<?php
while($row=mysqli_fetch_array($result))
{
?>
<tr>
<td><?php echo $row[1]?></td>
<td><?php echo $row[0]?></td>
<td><?php echo $row[8]?></td>
<td><?php echo $row[9]?></td>
<td><?php echo $row[10]?></td>
<td><?php echo $row[2]?></td>
<td><?php echo $row[3]?></td>
<td><?php echo $row[5]?></td>
<td><?php echo $row[4]?></td>
<td><?php echo $row[7]?></td>
<td><?php echo $row[6]?></td>
	</tr>
<?php
}
}
else
{
	echo "<h2>No Result Available</h2>";
}
?>
</table>
	
</div>
	
</body>
</html>
