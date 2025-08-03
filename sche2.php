
<?php
require "header bar.php";
?><script>
mtcap=new Array('A','a','B','b','C','c','D','d','E','e','F','f','G','g','H','h','I','i','J','j','K','k','L','l','M','m','N','n','O','o','P','p','Q','q','R','r','S','s','T','t','U','u','V','v','W','w','X','x','Y','y','Z','z','0','1','2','3','4','5','6','7','8','9')
var captcha;
 
function generateCaptcha() {
    var a = mtcap[Math.floor(Math.random()*mtcap.length)];
    var b = mtcap[Math.floor(Math.random()*mtcap.length)];
    var c = mtcap[Math.floor(Math.random()*mtcap.length)];
    var d = mtcap[Math.floor(Math.random()*mtcap.length)];
 	var e = mtcap[Math.floor(Math.random()*mtcap.length)];
	
	captcha=a.toString()+b.toString()+c.toString()+d.toString()+e.toString();
	
    document.getElementById("captcha").value = captcha;
}
 
function check(){
	var input=document.getElementById("inputText").value;
 
	if(input==captcha){
		alert("Equal");
	}
	else{
		alert("Not Equal");
	}
}
</script>

<?php
	function generateCaptcha(){
		$a=array('A','a','B','b','C','c','D','d','E','e','F','f','G','g','H','h','I','i','J','j','K','k','L','l','M','m','N','n','O','o','P','p','Q','q','R','r','S','s','T','t','U','u','V','v','W','w','X','x','Y','y','Z','z','0','1','2','3','4','5','6','7','8','9');
		
	}
?>
<div class="container-fluid" >
<?php
	if(isset($_REQUEST['b2'])){
		$slot=$_REQUEST['n1'];
		$d1=$_REQUEST['d'];
		$e=explode('-',$d1);
		$doa=$e[2]."-".$e[1]."-".$e[0];
		//echo $date;
		$ptype=$_REQUEST['t1'];
		$acode=$_REQUEST['cap'];
		$r=mysqli_query($con,"SELECT * FROM `exam` WHERE `e_id`='".$_SESSION['s1']."'");
		$row=mysqli_fetch_array($r);
		$r2=mysqli_query($con,"SELECT p_id FROM `paper_set` WHERE `c_id`='".$row[4]."' AND `status`='COMPLETE' AND `type`='".$ptype."'");		
		$count=mysqli_num_rows($r2);	
		if($count>0){
			$set=array();
			while($ro=mysqli_fetch_array($r2)){
				array_push($set,$ro[0]);
			}
			//print_r($set);
			$a=rand(1,count($set));
			$pcode=$set[$a-1];
			//echo $pcode;
			//$s1="UPDATE `exam` SET `Exam Date`='".$_SESSION['s3']."',`Exam Slot`='".$_SESSION['s2']."',`Paper Code`='".$pcode."',`Exam Status`='Incomplete' WHERE `Exam Code`='".$_SESSION['s1']."'";
			
			$s1="UPDATE `exam` SET `e_date`='".$d1."',`e_slot`='".$slot."',`p_type`='".$ptype."',`p_set`='".$pcode."',`activation code`='".$acode."',`status`='INCOMPLETE' WHERE `e_id`='".$_SESSION['s1']."'";
			$r4=mysqli_query($con,$s1);
			if($r4){
				echo "Schedulled Successfully";
			}else{
				echo "Try Again Later";
			}
		}else{
			echo "No paper availale for this course";
		}
	}
	elseif(isset($_REQUEST['b1'])){
		$s="SELECT * FROM `exam` WHERE `e_id`='".$_SESSION['s1']."'";	
		$r=mysqli_query($con,$s);
		$r2=mysqli_query($con,"SELECT * FROM `exam_sl`");
		if(mysqli_num_rows($r2)>0){
	?>
		<form name="f1" method="post" action="" >
			<input type="text" id="captcha" name="cap" required hidden >
				Date : <input type="date" min="<?php echo date("Y-m-d")?>" name="d" onClick="generateCaptcha()" required><br>
			<br>
			Select Shift :<select name='n1'>
			<?php
				while($row=mysqli_fetch_array($r2)){
			?>
				<option value="<?php echo $row[1]."-".$row[2] ?>"><?php echo $row[1]."-".$row[2] ?></option>
			<?php
				}
				?>
			</select><br><br>
			Paper Type: <input type="radio" name="t1" value='OFFLINE'>Offline <input type="radio" name="t1" value="ONLINE">Online<br><br>
			<input type="submit" name="b2" value="Enter">
		</form>
	<?php
		}else{
			echo "Add Exam Slots First";
		}
	}
?>
</div>
</body>
</html>