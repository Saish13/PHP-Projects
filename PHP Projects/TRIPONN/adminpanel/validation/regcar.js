function val(x)
{
	var alpha=/[A-Za-z'_]$/;
	if (x==1)
	{
		if (/[A-Za-z0-9'_-]$/.test(regcar.carid.value))
		{
			document.getElementById('carid').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('carid').src="validation/images/invalid.jpg";
		}
	}
	if (x==2)
	{
		if (/[A-Za-z0-9'_-]$/.test(regcar.carname.value))
		{
			document.getElementById('carname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('carname').src="validation/images/invalid.jpg";
		}
	}
	if (x==3)
	{
		if (/[0-9]$/.test(regcar.pq.value) && regcar.pq.value.length <= 2)
		{
			document.getElementById('pq').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('pq').src="validation/images/invalid.jpg";
		}
	}
	if (x==4)
	{
		if (alpha.test(regcar.ac.value))
		{
			document.getElementById('ac').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('ac').src="validation/images/invalid.jpg";
		}
	}
	if (x==5)
	{
		if (alpha.test(regcar.gear.value))
		{
			document.getElementById('gear').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('gear').src="validation/images/invalid.jpg";
		}
	}
	if (x==6)
	{
		if (alpha.test(regcar.bagg.value))
		{
			document.getElementById('bagg').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('bagg').src="validation/images/invalid.jpg";
		}
	}
	if (x==7)
	{
		if (alpha.test(regcar.leasedby.value))
		{
			document.getElementById('leasedby').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('leasedby').src="validation/images/invalid.jpg";
		}	
	}
	if (x==8)
	{
		if (/[0-9]$/.test(regcar.rate.value))
		{
			document.getElementById('rate').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('rate').src="validation/images/invalid.jpg";
		}	
	
	}
	if (x==9)
	{
		if (alpha.test(regcar.addet.value))
		{
			document.getElementById('addet').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('addet').src="validation/images/invalid.jpg";
		}	
	}
}