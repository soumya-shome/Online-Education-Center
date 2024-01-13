<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
require ("connnection.php");
$q+"select * from dept" ;
$result=mysql_query($q);
$count=mysql_num_rows($result);
if($count!=0)
{
?>
{
{
<h1> EXAM REPORT</h1>
<table border = '1'>
<tr>
<th>Student name</th>
<th>Course id</th>
<th>Exasm Code</th>
<th>Grade</th>
<th>Percentage</th>
<th>Status</th>>
</tr>
<?php
while($row=mysql_fetch_array($result))
{
$eCode=$row[0];
$sId=$row[1];
$nQ=$row[2];
$nWA=$row[3];
$nCA=$row[4];
$nM=$row[5];
$pC=$row[6];
$grade=$row[7];
$status=$row[8];
?>
<tr>
<td><?php echo $eCode?></td>
<td><?php echo $sId?></td>
<td><?php echo $nQ?></td>
<td><?php echo $nWA?></td>	
<td><?php echo $nCA?></td>
<td><?php echo $nM?></td>
<td><?php echo $pC?></td>
<td><?php echo $grade?></td>
<td><?php echo $status?></td>
</tr>
<?php
}
}
else
{
	echo "Empty Table";
}
?>
</table>
<?php
mysql_close($con);
?>




</body>
</html>