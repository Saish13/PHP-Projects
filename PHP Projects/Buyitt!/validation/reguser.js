function val(x)
{
	var alpha=/[A-Za-z'_]$/;
	if (x==1)
	{
		if (/[A-Za-z0-9'_-]$/.test(regusr.usrn.value))
		{
			document.getElementById('usrn').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('usrn').src="validation/images/invalid.jpg";
		}
	}
	if (x==2)
	{
		if (alpha.test(regusr.name.value))
		{
			document.getElementById('name').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('name').src="validation/images/invalid.jpg";
		}
	}
	if (x==3)
	{
		if (/[0-9]/.test(regusr.cn.value) && regusr.cn.value.length == 10)
		{
			document.getElementById('cn').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('cn').src="validation/images/invalid.jpg";
		}
	}
	if (x==4)
	{
		if (((regusr.eml.value.indexOf(".") > 0) && (regusr.eml.value.indexOf("@") > 0)) && (alpha.test(regusr.eml.value)))
		{
			document.getElementById('eml').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('eml').src="validation/images/invalid.jpg";
		}
	}
	if (x==5)
	{
		if (/[A-Za-z0-9_-]$/.test(regusr.pwd.value) && regusr.pwd.value!="")
		{
			document.getElementById('pass').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('pass').src="validation/images/invalid.jpg";
		}	
	}
	if (x==6)
	{
		if (/[A-Za-z0-9_-]$/.test(regusr.rpwd.value) && regusr.rpwd.value!="" && regusr.rpwd.value==regusr.pwd.value)
		{
			document.getElementById('repass').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('repass').src="validation/images/invalid.jpg";
		}
	
	}
	if (x==7)
	{
		if (regusr.add.value > "")
		{
			document.getElementById('add').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('add').src="validation/images/invalid.jpg";
		}
	}
}