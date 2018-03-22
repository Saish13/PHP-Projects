function val(x)
{
	var alpha=/[A-Za-z'_]$/;
	if (x==1)
	{
		if (/[A-Za-z0-9'_-]$/.test(regcus.cid.value))
		{
			document.getElementById('cid').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('cid').src="validation/images/invalid.jpg";
		}
	}
	if (x==2)
	{
		if (alpha.test(regcus.cname.value))
		{
			document.getElementById('cname').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('cname').src="validation/images/invalid.jpg";
		}
	}
	if (x==3)
	{
		if (((regcus.eml.value.indexOf(".") > 0) && (regcus.eml.value.indexOf("@") > 0)) && (alpha.test(regcus.eml.value)))
		{
			document.getElementById('eml').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('eml').src="validation/images/invalid.jpg";
		}
	}
	if (x==4)
	{
		if (/[0-9]/.test(regcus.cn.value) && regcus.cn.value.length == 10)
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
		if (/[0-9]/.test(regcus.age.value) && regcus.age.value.length <= 3 && regcus.age.value.length > 1)
		{
			document.getElementById('age').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('age').src="validation/images/invalid.jpg";
		}
	}
	if (x==6)
	{
		if (/[A-Za-z0-9_-]$/.test(regcus.pwd.value) && regcus.pwd.value!="")
		{
			document.getElementById('pwd').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('pwd').src="validation/images/invalid.jpg";
		}	
	}
	if (x==7)
	{
		if (/[A-Za-z0-9_-]$/.test(regcus.rpwd.value) && regcus.rpwd.value!="" && regcus.rpwd.value==regcus.pwd.value)
		{
			document.getElementById('rpwd').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('rpwd').src="validation/images/invalid.jpg";
		}
	
	}
	if (x==8)
	{
		if (regcus.add.value > "")
		{
			document.getElementById('add').src="validation/images/valid.png";
		}
		else
		{
			document.getElementById('add').src="validation/images/invalid.jpg";
		}
	}

}