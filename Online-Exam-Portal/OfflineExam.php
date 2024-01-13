<?php
require "header3.php";
$result1=mysqli_query($con,"SELECT * FROM `paper_set` WHERE `p_id`= '".$_SESSION['op']."'");
$row1=mysqli_fetch_array($result1);	
?>
<script>	
	var elem =document.documentElement;
	
	function openFullscreen() {
  		if (elem.requestFullscreen) {
			elem.requestFullscreen();
		  } else if (elem.mozRequestFullScreen) { /* Firefox */
			elem.mozRequestFullScreen();
		  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
		elem.webkitRequestFullscreen();
		} else if (elem.msRequestFullscreen) { /* IE/Edge */
		elem.msRequestFullscreen();
		}
	}
	
	function closeFullscreen() {
	  if (document.exitFullscreen) {
		document.exitFullscreen();
	  } else if (document.mozCancelFullScreen) { /* Firefox */
		document.mozCancelFullScreen();
	  } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
		document.webkitExitFullscreen();
	  } else if (document.msExitFullscreen) { /* IE/Edge */
		document.msExitFullscreen();
	  }
	}

	document.onkeydown = function (e) {
        return false;
	}
	
	function StartTime(){
		document.getElementById("n1".disable);
		openFullscreen();
		<?php
		$ti="";
		$s1="SELECT time,file FROM `p_off` WHERE `p_id`='".$_SESSION['op']."'";
		$r1=mysqli_query($con,$s1);
		$row2=mysqli_fetch_array($r1);
		$time=$row2[0];
		?>
		var num = <?php echo $time ?>;
		var hours = (num / 60);
		var rhours = Math.floor(hours);
		var minutes = (hours - rhours) * 60;
		var rminutes = Math.round(minutes);
		var hr=<?php echo date("H")?>+rhours;
		var min=<?php echo date("i")?>+rminutes;
		var ntime=hr+":"+min+":"+"<?php echo date("s") ?>"
		var nttime="<?php echo date("M")." ".date("j").", ".date("Y") ?>,"+ntime
		
		var countDownDate = new Date(nttime).getTime();
		var x = setInterval(function() {
			var now = new Date().getTime(); 
			var t = countDownDate - now; 
			var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
			var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60)); 
			var seconds = Math.floor((t % (1000 * 60)) / 1000); 
			document.getElementById("demo").innerHTML =  hours + "h " + minutes + "m " + seconds + "s ";
		  	if (t < 0) {
				clearInterval(x);
				closeFullscreen();
				document.getElementById("demo").innerHTML = "Time Over";
			  	document.myForm.submit();
		  	}
		}, 1000);
	}
	
	function di(){
		 $("#btnTest").attr("disabled", true);
		StartTime();
		showDiv();
	}
	
	function showDiv() {
		document.getElementById('exam').style.display = "block";
	}
</script>
<div>
	Rules: ...
	
	<button onClick="di()" id="btnTest" >Start Exam</button>

</div>
<div id="exam" style="display:none;">
	Total time: <p id="tt"></p><br>
	Time Left: <p id="demo"></p> 
	<?php
	$paper=$_SESSION['op'];
	$result=mysqli_query($con,"SELECT * FROM `question` WHERE `p_id`= '".$paper."'");
	$_SESSION['q1']=1;
?>
	<form method="post" action="check_p_2.php">
	<input type="submit" >
</form>
  		<iframe src="Files/<?php echo $row2[1] ?>#toolbar=0&navpanes=0&scrollbar=0" scrolling="no" frameborder="0" height="100%" width="100%" style="position:absolute; clip:rect (190px,1100px,800px,250px);"></iframe>
	
</div>

</body>
</html>

