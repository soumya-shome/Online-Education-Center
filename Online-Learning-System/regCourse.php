<?php
require("header bar.php");
?>
<div class="container-fluid">
<?php
if(isset($_REQUEST['b1'])){
	$a=$_REQUEST['t0'];
	$b=$_REQUEST['t1'];
	$mm=$_REQUEST['t2'];
	$hr=$_REQUEST['t3'];
	$time=$mm." Months ".$hr." Hours";
	$em= mysqli_real_escape_string($con, $_REQUEST['t4']);
	$filename = $_FILES["t5"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["t5"]["size"];
	$allowed_file_types = array('.doc','.docx','.rtf','.pdf');	
	$newfilename=NULL;
	if ( !empty($file_basename) )
	{	
		if(in_array($file_ext,$allowed_file_types)){
				// Rename file
			$newfilename = $a . $file_ext;
			if (file_exists("Files/" . $newfilename))
			{
				// file already exists error
				echo "You have already uploaded this file.";
			}
			else
			{		
				move_uploaded_file($_FILES["t5"]["tmp_name"], "Files/" . $newfilename);
				echo "File uploaded successfully.";		
			}
		}
		else
		{
			echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
			unlink($_FILES["t5"]["tmp_name"]);
		}
	}
	
	$r2=mysqli_query($con,"INSERT INTO `course`(`c_id`, `name`, `duration`, `description`, `file`) VALUES ('".$a."','".$b."','".$time."','".$em."','".$newfilename."')");
	if($r2){
		echo "<h3>Course Registered Successfully";
	}
	else{
		echo "<h2>Registration Failed. Please Check the Details.";	
	}
	unset($_REQUEST['b1']);
}
else{
	header("Location:Register.php");
}
?>
</div>
</body>
</html>