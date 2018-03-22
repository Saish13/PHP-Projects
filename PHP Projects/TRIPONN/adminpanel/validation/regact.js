function val(x)
{
	var alpha=/[A-Za-z'_]$/;
	if (x==1)
	{
		if (/[A-Za-z0-9'_-]$/.test(regact.actid.value))
		{
			document.getElementById('actid').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('actid').src="validation/images/invalid.jpg";
		}
	}
	if (x==2)
	{
		if (/[A-Za-z'_-]$/.test(regact.actname.value))
		{
			document.getElementById('actname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('actname').src="validation/images/invalid.jpg";
		}
	}
	if (x==3)
	{
		if (/[0-9-]$/.test(regact.actdate.value))
		{
			document.getElementById('actdate').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('actdate').src="validation/images/invalid.jpg";
		}
	}
	if (x==4)
	{
		if (alpha.test(regact.count.value))
		{
			document.getElementById('count').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('count').src="validation/images/invalid.jpg";
		}
	}
	if (x==5)
	{
		if (alpha.test(regact.state.value))
		{
			document.getElementById('state').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('state').src="validation/images/invalid.jpg";
		}
	}
	if (x==6)
	{
		if (alpha.test(regact.area.value))
		{
			document.getElementById('area').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('area').src="validation/images/invalid.jpg";
		}	
	}
	if (x==7)
	{
		if (/[0-9]$/.test(regact.rate.value))
		{
			document.getElementById('rate').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('rate').src="validation/images/invalid.jpg";
		}
	
	}
	if (x==8)
	{
		if (/[0-9]$/.test(regact.dis.value) && regact.dis.value.length <= 2)
		{
			document.getElementById('dis').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('dis').src="validation/images/invalid.jpg";
		}
	}
	if (x==9)
	{
		if (/[A-Za-z0-9'_-]$/.test(regact.ad.value))
		{
			document.getElementById('ad').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('ad').src="validation/images/invalid.jpg";
		}
	}
	if (x==10)
	{
		if (/[A-Za-z0-9'_-]$/.test(regact.tnc.value))
		{
			document.getElementById('tnc').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('tnc').src="validation/images/invalid.jpg";
		}
	}
}