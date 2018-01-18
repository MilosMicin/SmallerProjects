var xmlHttp = null;
function vratiPredstave(value)
{
	xmlHttp = GetXmlHttpObject();
	if(xmlHttp == null)
	{
		alert("Browser ne podrzava HTTP Request");
		return;
	}
	var url = "listafilmova.php";
	url = url+"?rec="+ value;
	xmlHttp.onreadystatechange = popuniListu;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function popuniListu()
{
	if(xmlHttp.readyState == 4 || xmlHttp.readyState == "complete")
	{
		var lista = document.getElementById("ddlPredstava");
		isprazniListu(lista);
		var modeli = eval("("+xmlHttp.responseText+")");
		for(var m in modeli)
		{
			if(modeli.hasOwnProperty(m))
			{
				ubaciUlistu(lista,modeli[m],m);
			}
		}
	}
}

function ubaciUlistu(lista,tekst,vrednost)
{
	var element = document.createElement('option');
	
	element.text = tekst;
	element.value = vrednost;
	try
	{
		lista.add(element,null);
	}
	catch(ex)
	{
		lista.add(element);
	}
}

function isprazniListu(lista)
{
	var brojElemenata = lista.length;
	for(var i = brojElemenata; i != 0; i--)
	{
		lista.remove(i);
	}
}