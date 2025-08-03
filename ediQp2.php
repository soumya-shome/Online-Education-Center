<?php
require("header bar.php");
?>
<script type="text/javascript">
        function sum() {
            var txtFirstNo = document.getElementById('t4').value;
            var txtSecondNo = document.getElementById('t3').value;
            var result = parseInt(txtFirstNo) * parseInt(txtSecondNo);
            if (!isNaN(result)) {
                document.getElementById('t6').value = result;
            }
        }
    </script>
<div>
<?php
	if(isset($_REQUEST['b1'])){
		$pcode=$_REQUEST['t0'];
		$r1=mysqli_query($con,"SELECT * FROM `p_off` WHERE `p_id`='".$pcode."'");
		$row1=mysqli_fetch_array($r1);
		$tm=$_REQUEST['t1'];
		$time=$_REQUEST['t2'];
		$filename = $_FILES["t3"]["name"];
		$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$allowed_file_types = array('.doc','.docx','.rtf','.pdf');	
		$newfilename=NULL;
		if ( !empty($file_basename) && $row1[2]!=NULL && $row1[3]!=NULL)
		{	
			if(in_array($file_ext,$allowed_file_types)){
					// Rename file
				$newfilename = $pcode . $file_ext;
				echo $newfilename;
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
				unlink($_FILES["t3"]["tmp_name"]);
			}
		}
		else{
			$newfilename=$row1[0];
		}
		$s="UPDATE `p_off` SET`file`='".$newfilename."',`tot_marks`='".$tm."',`time`='".$time."' WHERE `p_id`='".$pcode."'";
		$r2=mysqli_query($con,$s);
		if($r2){
			echo "Paper Updated Successfully";
		}
		else{
			echo "Some Error Occured. Please Check the Details.";	
		}
	}
	elseif(isset($_REQUEST['b2'])){
		$pcode=$_REQUEST['t0'];
		$filename = $_FILES["t1"]["name"];
		$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$allowed_file_types = array('.doc','.docx','.rtf','.pdf');	
		$newfilename=NULL;
		if ( !empty($file_basename) )
		{	
			if(in_array($file_ext,$allowed_file_types)){
					// Rename file
				$newfilename = $pcode . $file_ext;
				if (file_exists("Files/" . $newfilename))
				{
					// file already exists error
					echo "You have already uploaded this file.<br>";
				}
				else
				{		
					move_uploaded_file($_FILES["t1"]["tmp_name"], "Files/" . $newfilename);
					echo "File uploaded successfully.<br>";		
				}
			}
			else
			{
				echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
				unlink($_FILES["t1"]["tmp_name"]);
			}
		}
		$s="UPDATE `p_off` SET `file`='".$newfilename."' WHERE `p_id`='".$pcode."'";
		$r2=mysqli_query($con,$s);
		if($r2){
			echo "<br>Paper Updated Successfully";
		}
		else{
			echo "<br>Some Error Occured. Please Check the Details.";	
		}
	}
	elseif(isset($_REQUEST['b3'])){
		$pcode=$_REQUEST['v1'];
		$r1=mysqli_query($con,"SELECT * FROM `p_off` WHERE `p_id`='".$pcode."'");
		$row1=mysqli_fetch_array($r1);
		if($_REQUEST['r1']=='Y' && $row1[2]!=NULL){
			$file_pointer = "Files/".$row1[2];
			if (!unlink($file_pointer)) { 
				echo ("file cannot be deleted due to an error<br>"); 
			} 
			else { 
				echo ("File has been deleted<br>"); 
			}
			$r1=mysqli_query($con,"UPDATE `p_off` SET `file` = '' WHERE `p_id` = '".$pcode."'");
			if($r1){
				echo "Deleted Succesfully";
				$_SESSION['cou']=0;
			}
		}
		else{
			header("Location:adminHome.php");
		}
	}
	elseif(isset($_REQUEST['t1'])){
		$pcode=$_REQUEST['t1'];
		$r1=mysqli_query($con,"SELECT * FROM `p_off` WHERE `p_id`='".$pcode."'");
		$row1=mysqli_fetch_array($r1);
		?>
			<form method="post" enctype="multipart/form-data" action="">
				Paper Code: <input type="text" value="<?php echo $pcode ?>" name="t0" readonly><br><br>
				Total Marks : <input type="text" name="t1" value="<?php echo $row1[3] ?>" required><br><br>
				Time : <input type="text" name="t2" value="<?php echo $row1[4] ?>"> in Mins <br><br>
				<?php
				if($row1[2]!=NULL){
				?>
				Paper : <a href="<?php echo "Files/".$row1[2] ?>" target="_blank">View</a><br><br>
				<?php
				}
			?>
				Question Paper : <input type="file" name="t3" ><br><br>
				<input type="submit" value="Enter" name="b1">
			</form>
	<?php
	}
	elseif(isset($_REQUEST['t2'])){
		$pcode=$_REQUEST['t2'];
		#$r1=mysqli_query($con,"SELECT * FROM `p_on` WHERE `p_id`='".$pcode."'");
		#$row1=mysqli_fetch_array($r1);
		?>
		<form method="post" action="" enctype="multipart/form-data">
			Paper ID:<input type="text" name="t0" value="<?php echo $pcode ?>" readonly><br><br>	
			File : <input type="file" name="t1" required><br><br>
			<input type="submit" name="b2" value="Enter">
		</form>
		<?php
	}
	elseif(isset($_REQUEST['t3'])){
		$pcode=$_REQUEST['t3'];
		?>
		Are You Sure ,you want to delete this Paper?
	<form action="" method="post">
		<input type="text" value="<?php echo $pcode ?>" name="v1" hidden="">
		<input type="radio" name="r1" value="Y" required>Yes<br>
		<input type="radio" name="r1" value="N" required>No<br>
		<input type="submit" name="b3" value="Delete">
	</form>
	<?php
	}
?>
</div>
</body>
</html>