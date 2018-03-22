function vld(x)
{
	var alpha=/[A-Za-z'_]$/;
	var num=/[0-9]$/;
	if (x==1)
	{
		if (/[A-Za-z0-9'_-]$/.test(prodform.pid.value))
		{
			document.getElementById('pid').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('pid').src="validation/images/invalid.jpg";
		}
	}
	if (x==2)
	{
		if (/[A-Za-z0-9'_-]$/.test(prodform.pname.value))
		{
			document.getElementById('pname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('pname').src="validation/images/invalid.jpg";
		}
	}
	if (x==3)
	{
		if (alpha.test(prodform.ptype.value))
		{
			document.getElementById('ptype').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('ptype').src="validation/images/invalid.jpg";
		}
	}
	if (x==4)
	{
		if (alpha.test(prodform.psubtype.value))
		{
			document.getElementById('psubtype').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('psubtype').src="validation/images/invalid.jpg";
		}
	}
	if (x==5)
	{
		if (num.test(prodform.pqty.value))
		{
			document.getElementById('pqty').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('pqty').src="validation/images/invalid.jpg";
		}
	}
	if (x==6)
	{
		if (/[A-Za-z0-9'_-]$/.test(prodform.psize.value))
		{
			document.getElementById('psize').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('psize').src="validation/images/invalid.jpg";
		}
	}
	if (x==7)
	{
		if (alpha.test(prodform.pcolor.value))
		{
			document.getElementById('pcolor').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('pcolor').src="validation/images/invalid.jpg";
		}
	}
	if (x==8)
	{
		if (num.test(prodform.prate.value))
		{
			document.getElementById('prate').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('prate').src="validation/images/invalid.jpg";
		}
	}
	if (x==9)
	{
		if (num.test(prodform.pdiscount.value))
		{
			document.getElementById('pdiscount').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('pdiscount').src="validation/images/invalid.jpg";
		}
	}
	if (x==10)
	{
		if (/[A-Za-z0-9'_-]$/.test(prodform.pdesc.value))
		{
			document.getElementById('pdesc').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('pdesc').src="validation/images/invalid.jpg";
		}
	}
}