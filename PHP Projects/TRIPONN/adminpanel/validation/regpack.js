function val(x)
{
	var alpha=/[A-Za-z'_]$/;
	if (x==1)
	{
		if (/[A-Za-z0-9'_-]$/.test(regpack.packid.value))
		{
			document.getElementById('packid').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('packid').src="validation/images/invalid.jpg";
		}
	}
	if (x==2)
	{
		if (/[A-Za-z0-9'_-]$/.test(regpack.packname.value))
		{
			document.getElementById('packname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('packname').src="validation/images/invalid.jpg";
		}
	}
	if (x==3)
	{
		if (/[0-9-]$/.test(regpack.sd.value))
		{
			document.getElementById('sd').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('sd').src="validation/images/invalid.jpg";
		}
	}
	if (x==4)
	{
		if (/[0-9-]$/.test(regpack.ed.value))
		{
			document.getElementById('ed').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('ed').src="validation/images/invalid.jpg";
		}
	}
	if (x==5)
	{
		if (/[0-9-]$/.test(regpack.noc.value) && regpack.noc.value.length <= 2)
		{
			document.getElementById('noc').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('noc').src="validation/images/invalid.jpg";
		}
	}
	if (x==6)
	{
		if (/[0-9-]$/.test(regpack.noa.value) && regpack.noa.value.length <= 2)
		{
			document.getElementById('noa').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('noa').src="validation/images/invalid.jpg";
		}
	}
	if (x==7)
	{
		if (alpha.test(regpack.count.value))
		{
			document.getElementById('count').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('count').src="validation/images/invalid.jpg";
		}	
	}
	if (x==8)
	{
		if (alpha.test(regpack.state.value))
		{
			document.getElementById('state').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('state').src="validation/images/invalid.jpg";
		}	
	
	}
	if (x==9)
	{
		if (alpha.test(regpack.area.value))
		{
			document.getElementById('area').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('area').src="validation/images/invalid.jpg";
		}	
	}
	if (x==10)
	{
		if (/[0-9]$/.test(regpack.rate.value))
		{
			document.getElementById('rate').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('rate').src="validation/images/invalid.jpg";
		}
	}
	if (x==11)
	{
		if (/[0-9]$/.test(regpack.dis.value) && regpack.dis.value.length <= 2)
		{
			document.getElementById('dis').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('dis').src="validation/images/invalid.jpg";
		}
	}
	if (x==12)
	{
		if (/[A-Za-z0-9'_-]$/.test(regpack.pd.value))
		{
			document.getElementById('pd').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('pd').src="validation/images/invalid.jpg";
		}
	}
}