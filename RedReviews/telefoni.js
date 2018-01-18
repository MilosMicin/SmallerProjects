var xmlHttp = null;
function telefon1(str)
{
	xmlHttp = GetXmlHttpObject();
	var url = "telefon1.php";
	url = url+"?text="+str;
	xmlHttp.onreadystatechange = listaTelefona;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function telefon2(str)
{
	xmlHttp = GetXmlHttpObject();
	var url = "telefon2.php";
	url = url+"?text="+str;
	xmlHttp.onreadystatechange = listaTelefona;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function telefon3(str)
{
	xmlHttp = GetXmlHttpObject();
	var url = "telefon3.php";
	url = url+"?text="+str;
	xmlHttp.onreadystatechange = listaTelefona;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function telefon4(str)
{
	xmlHttp = GetXmlHttpObject();
	var url = "telefon4.php";
	url = url+"?text="+str;
	xmlHttp.onreadystatechange = listaTelefona;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function telefon5(str)
{
	xmlHttp = GetXmlHttpObject();
	var url = "telefon5.php";
	url = url+"?text="+str;
	xmlHttp.onreadystatechange = listaTelefona;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function listaTelefona()
{
	if(xmlHttp.readyState == 4)
	{
		document.getElementById("right-part").innerHTML = xmlHttp.responseText;
	}
}