<?php
require "header bar2.php";
?>
<script>
	function check(a,b){
	var input=document.getElementById("inputText").value;
		if(input==a){
			if(b=="ONLINE")
				window.location.href="OnlineExam.php";
			else if(b=="OFFLINE")
				window.location.href="OfflineExam.php";
		}
		else{
			alert("Wrong Activation Code. Enter Again !!!");
		}
	}
	
	
	</script>
<div class="container-fluid">
	
<?php
	
	$r=mysqli_query($con,"SELECT * FROM `exam` WHERE `st_id`='".$_SESSION['id']."' AND `status`='INCOMPLETE';");
	$row=mysqli_fetch_array($r);
	$mon=substr($row[1],3,-5);
	$day=substr($row[1],0,2);
	$stat=0;
	if(mysqli_num_rows($r)>0){		
		if($row[1]==date("d-m-Y")){
			$time=explode('-',$row[2]);
				if(date("H")>=$time[0] && date("H")<$time[1]){
					$stat=1;
				}
				elseif(date("H")<$time[0]){
					$stat=0;
				}
				else{
					$stat=2;
				}
		}else if(date("d")!=$day && date("m")>$mon){	
			$stat=2;
		}else if(date("m")<=$mon) {
			if(date("d")>$day){
				$stat=2;
			}
			else{
				$stat=0;	
			}
			
		}
		if($stat==1){
			echo "Exam Id: ".$row[0]."<br>";
			echo "Exam Date: ".$row[1]."<br>";
			echo "Exam Slot: ".$row[2]."<br>";
			echo "Student ID: ".$row[3]."<br>";
			echo "Course ID: ".$row[4]."<br>";
			echo "Paper Set: ".$row[6]."<br>";
			echo "Paper Set: ".$row[5]."<br>";
			echo "Paper type: ".$row[7]."<br>";
			$_SESSION['op']=$row[6];
		?>
			<input type="text" id="inputText">
			<button onClick="check(<?php echo "'".$row[7]."','".$row[5]."'" ?>)" >Start</button>
		<?php
		}
		if($stat==2){
			echo "<h2>You missed your examination time.</h2>";
		}
		elseif($stat==0){
			echo "<h3>Your Exam is Scheduled on ".$row[1]."</h3>";
		}
	}
	else{
		$r2=mysqli_query($con,"SELECT * FROM `exam` WHERE `st_id`='".$_SESSION['id']."'");
		$count=mysqli_num_rows($r);
		$count2=mysqli_num_rows($r2);
		$row1=mysqli_fetch_array($r2);
		if($row1[8]=="APPLIED"){
			echo "<h2>Your Exam is not Scheduled Yet</h2>";
		}
		else{
			if($count>0){
				echo "<h2>You Have Given the Exam</h2>";
			}
			else
			{
				echo "<h2>You Don't have any exam</h2>";
			}
		}
	}
?>
	</div>
</body>
</html>