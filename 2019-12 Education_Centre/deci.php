<?php
session_start();
$a=$_REQUEST['r1'];
if($a=="Apply"){
	header("Refresh:0;URL=applyE2.php");
}
elseif($a=="ReApply"){
	header("Refresh:0;URL=ReApply.php");
}

?>