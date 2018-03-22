<?php

	

?>
<html>
<head>
<script language="javascript" type="text/javascript">
<!--	
	//Javascript code for slideshow with fade effect
	var j=1;
	var ct=1;
	var duration = 600;
	function SetOpa(Opa)
	{
		document.getElementById('ss').style.opacity = Opa;
	}
	function fadein()
	{
		for (var i = 0; i <= 1; i += 0.01) 
		{
			setTimeout("SetOpa(" + (1 - i) +")", i * duration);
		}
	}
	function fadeout()
	{
		for (var i = 0; i <= 1; i += 0.01) 
		{
			setTimeout("SetOpa(" + i +")", i * duration);
		}
	}
	function changeimg()
	{
		var name='ssimg/sshow/'+ j +'.jpg';
		document.getElementById('ss').src=name;
		if (j==10)
		{
			j=0;
		}
		j++;
		fi=setTimeout("fadein()", 4450);
		if (fi)
		{
			fo=setTimeout("fadeout()", 1);
		}
	}
	
-->	
</script>
<style>
#sshow
{
	position:absolute;
	width:900px;
	height:400px;
	top:50px;
	left:200px;
}
#sshowb
{
	background-color:#2C2C2C;
	position:absolute;
	width:900px;
	height:400px;
	top:50px;
	left:200px;
	z-index:-5;
}
#ss
{
	opacity:1;
	border-radius:30px;
}
#para
{
	position:absolute;
	top:550px;

}
</style>
</head>
<body onload="setInterval('changeimg()', 5000);">
<div id="sshow" >
<img id="ss" src="ssimg/sshow/1.jpg" width="900px" height="400px" />
</div>
</body>
</html>