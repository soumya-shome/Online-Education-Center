<!doctype html>
<html>
<head>
	
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title>Untitled Document</title>
	
<script>
	var elem =document.documentElement;
	function check(a){
		//alert(a);
		window.location.href="17.php";
	}
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
	</script>
	
<script>	
	function StartTime(){
		document.getElementById("n1".disable);
		openFullscreen();
<?php
	$time=1;
	$ct=date("i")+$time;
	$s=date("s");
?>
		var countDownDate = new Date("<?php echo date("M")." ".date("j").", ".date("Y") ?>, <?php echo date("H").":".$ct.":".$s ?>").getTime();
		//var countDownDate = new Date("Mar 10, 2020,16:21:50").getTime();

		var x = setInterval(function() {
		  var now = new Date().getTime();

			var distance = countDownDate - now;
		  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		//
		  document.getElementById("demo").innerHTML =  minutes + "m " + seconds + "s ";
		  if (distance < 0) {
			  closeFullscreen();
			clearInterval(x);
			document.getElementById("demo").innerHTML = "Time Over";
			  document.myForm.submit();
			  
		  }
		}, 1000);
	}
</script>
</head>

<body onLoad="">
	<button onClick="StartTime()" id="n1">Start</button>
	Time Left: <p id="demo"></p> 
</body>
</html>