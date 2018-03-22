function val(x)
{
	var alpha=/[A-Za-z'_]$/;
	if (x==1)
	{
		if (/[A-Za-z0-9'_-]$/.test(regret.rid.value))
		{
			document.getElementById('rid').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('rid').src="validation/images/invalid.jpg";
		}
	}
	if (x==2)
	{
		if (/[A-Za-z0-9'_-]$/.test(regret.compnm.value))
		{
			document.getElementById('compnm').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('compnm').src="validation/images/invalid.jpg";
		}
	}
	if (x==3)
	{
		if (alpha.test(regret.tob.value))
		{
			document.getElementById('tob').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('tob').src="validation/images/invalid.jpg";
		}
	}
	if (x==4)
	{
		if (/[0-9]/.test(regret.cn.value) && regret.cn.value.length == 10)
		{
			document.getElementById('cn').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('cn').src="validation/images/invalid.jpg";
		}
	}
	if (x==5)
	{
		if (((regret.eml.value.indexOf(".") > 0) && (regret.eml.value.indexOf("@") > 0)) && (alpha.test(regret.eml.value)))
		{
			document.getElementById('eml').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('eml').src="validation/images/invalid.jpg";
		}
	}
	if (x==6)
	{
		if (/[A-Za-z0-9_-]$/.test(regret.pass.value) && regret.pass.value!="")
		{
			document.getElementById('pass').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('pass').src="validation/images/invalid.jpg";
		}	
	}
	if (x==7)
	{
		if (/[A-Za-z0-9_-]$/.test(regret.repass.value) && regret.repass.value!="" && regret.repass.value==regret.pass.value)
		{
			document.getElementById('repass').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('repass').src="validation/images/invalid.jpg";
		}
	
	}
	if (x==8)
	{
		if (regret.add.value > "")
		{
			document.getElementById('add').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('add').src="validation/images/invalid.jpg";
		}
	}
}