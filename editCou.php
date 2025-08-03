<?php
require("header bar.php");
?>
<div class="container-fluid">
<?php
	
	if($_SESSION['cou']==0){
		header("Location:viewCou.php");
	}
	
	
	
	if(isset($_REQUEST['b1'])){
		$a=$_REQUEST['b1'];
		$r1=mysqli_query($con,"SELECT * FROM `course` WHERE `c_id`='".$a."'");
		$row=mysqli_fetch_array($r1);
?>		EDIT Details
	<form method="post" action="" enctype="multipart/form-data">
		Course ID <input type="text" value="<?php echo $row[0] ?>" name="t1" readonly><br><br>
		Course Name <input type="text" value="<?php echo $row[1] ?>" name="t2" ><br><br> 
		Duration <input type="text" value="<?php echo $row[2] ?>" name="t3" ><br><br>
		Description: <div><textarea id="text" cols="40" rows="4" name="t4"><?php echo $row[3] ?></textarea></div><br><br>
		Uploaded File: 
<?php
			if($row[4]!=NULL){
?>
			<input type="text" name="t6" value="<?php echo $row[4] ?>" readonly>
			<a href="<?php echo "Files/".$row[4] ?>"  target="_blank">View File</a><br><br>
<?php
		}
		else{
?>
			<input type="text" name="t6" value="No File Uploaded" readonly><br><br>
<?php 
		}
?>
		File: <input type="file" name="t5" ><br><br>
		<input type="submit" name="b3" value="Enter"> 
	</form>
<?php
	}
	
	
	elseif(isset($_REQUEST['b3'])){
		$newfilename=NULL;
		$b=$_REQUEST['t1'];//c_id
		$mm=$_REQUEST['t2'];//c_name
		$hr=$_REQUEST['t3'];//duration
		$em= mysqli_real_escape_string($con, $_REQUEST['t4']);
		$filename = $_FILES["t5"]["name"];
		if($filename!=NULL){
			$file_ext = substr($filename, strripos($filename, '.'));
			$allowed_file_types = array('.doc','.docx','.rtf','.pdf');	
			if (in_array($file_ext,$allowed_file_types) )
			{	
				// Rename file
				$newfilename = $b . $file_ext;	
				//unlink("Files/".$newfilename);
				move_uploaded_file($_FILES["t5"]["tmp_name"], "Files/" . $newfilename);
				echo "File updated successfully.";
			}
			else
			{
				echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
				unlink($_FILES["t5"]["tmp_name"]);
			}
		}
		else{
			if(($_REQUEST['t6'])!="No File Uploaded"){
				$newfilename=$_REQUEST['t6'];
			}
			else{
				$newfilename='';
			}
		}
		//echo "UPDATE `course` SET `name`='".$mm."',`duration`='".$hr."',`description`='".$em."',`file`='".$newfilename."' WHERE `c_id`='".$b."'";
		$r1=mysqli_query($con,"UPDATE `course` SET `name`='".$mm."',`duration`='".$hr."',`description`='".$em."',`file`='".$newfilename."' WHERE `c_id`='".$b."'");
		if($r1){
			echo "Updated Succesfully";
			$_SESSION['cou']=0;
		}
	}
	
	
	elseif(isset($_REQUEST['b2'])){
		$b=$_REQUEST['b2'];
		//file delete
		$r5=mysqli_query($con,"SELECT `file` FROM `course` WHERE `c_id`='".$b."'");
		$row2=mysqli_fetch_array($r5);
		$f=$row2[0];
		if($f!=NULL){
			echo "Are you Sure You want to delete the File? ";
?>
			<form method="post" action="">
				File Name:<input type="text" value="<?php echo $f ?>" name="f" readonly>
				Course ID:<input type="text" value="<?php echo $b ?>" name="s" readonly>
				<input type="radio" name="d" value="Y">Yes
				<input type="radio" name="d" value="N">No<br>
				<input type="submit" name="b5" value="Enter"> 
			</form>
<?php
		}
		else{
			echo "No File To Delete<br><br>";
		}
		
		//course delete
		echo "Are you Sure You want to delete ";
?>
			
		<form method="post" action="">
			<input type="text" value="<?php echo $b ?>" name="s" readonly>
			<input type="radio" name="d" value="Y">Yes
			<input type="radio" name="d" value="N">No<br>
			<input type="submit" name="b4" value="Enter"> 
		</form>
<?php
	}
	
	
	
	elseif(isset($_REQUEST['b4'])){
		$t=$_REQUEST['d'];
		if($t=='Y'){
		$r1=mysqli_query($con,"UPDATE `course` SET `name`='',`duration`='',`description`='',`file`='' WHERE `c_id`='".$_REQUEST['s']."'");
		if($r1){
			echo "Deleted Succesfully";
			$_SESSION['cou']=0;
		}
		}
		elseif($t=='N'){
			header("Location:viewStu.php");
			$_SESSION['ed']=0;
		}
	}
	
	elseif(isset($_REQUEST['b5'])){
		$t=$_REQUEST['d'];
		if($t=='Y'){
			$file_pointer = "Files/".$_REQUEST['f']; 
			if (!unlink($file_pointer)) { 
				echo ("file cannot be deleted due to an error"); 
			} 
			else { 
				echo ("File has been deleted"); 
			}
			$r1=mysqli_query($con,"UPDATE `course` SET `file` = '' WHERE `course`.`c_id` = '".$_REQUEST['s']."'");
			if($r1){
				echo "Deleted Succesfully";
				$_SESSION['cou']=0;
			}
		}
		elseif($t=='N'){
			header("Location:viewStu.php");
			$_SESSION['ed']=0;
		}
	}
	
?>
</div>
</body>
</html>