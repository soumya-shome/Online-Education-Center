<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<script>
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
</head>

<body>
	<input type="text" id="captcha" disabled/><br/><br/>
<input type="text" id="inputText"/><br/><br/>
<button onclick="generateCaptcha()">Refresh</button>
<button onclick="check()">Submit</button>
	
</body>
</html>