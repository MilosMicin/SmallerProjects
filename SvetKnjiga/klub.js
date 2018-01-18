function prijava()
{
	var ime = document.getElementById("ime");
	var email = document.getElementById("email");
	var password = document.getElementById("password");
	var confPassword = document.getElementById("confPassword");
	var pol = document.getElementsByName("rdbPol");
	
	var reIme = /^[A-Z]{1}[a-z]{2,16}$/;
	var reEmail = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	var rePassword = /^([a-z])+[0-9]{1}$/
	
	var podaci = new Array();
	var greske = new Array();
	
	if(!ime.value.match(reIme))
	{
		greske.push("Unesite pravilno vas Screen name!");
	}
	else
	{
		podaci.push(ime.value);
	}
	if(!email.value.match(reEmail))
	{
		greske.push("Unesite pravilno vasu email adresu!");
	}
	else
	{
		podaci.push(email.value);
	}
	if(!password.value.match(rePassword))
	{
		greske.push("Unesite pravilno vasu sifru!");
	}
	else
	{
		podaci.push(password.value);
	}
	if(confPassword.value != password.value)
	{
		greske.push("Ponovite pravilno svoju lozinku!");
	}
	else
	{
		podaci.push(confPassword.value);
	}
	var izabraniPol = "";
	
	for(var i = 0; i < pol.length; i++)
	{
		if(pol[i].checked)
		{
			izabraniPol = pol[i].value;
			break;
		}
	}
	if(izabraniPol ==""){
	greske.push("izaberite pol");
	}
	else
	{
		podaci.push(izabraniPol);
	}
	var divPodaci = document.getElementById("podaci_klub");
	var rezultat = "<ul>";
	if(greske.length == 0)
	{
		for(var i = 0; i < podaci.length; i++)
		{
			rezultat += "<li>"+podaci[i]+"</li>";
		}
	}
	else
	{
		for(var i = 0; i < greske.length; i++)
		{
			rezultat +="<li>"+greske[i]+"</li>";
		}
	}
	rezultat += "</ul>";
	divPodaci.innerHTML = rezultat;
}

function provera(obj){
     var vrednost = obj.value;
	 var reEmail = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
     if(!vrednost.match(reEmail)){
        alert("Email nije u dobrom formatu !!!");
        obj.focus();
        
     }
     return;
 }
function pronadji()
	{
		var xmlhttp = null;
		if(window.XMLHttpRequest)
		{
			xmlhttp = new XMLHttpRequest();
		}
		else
		{
			xmlhttp = new ActiveXObject("microsoft.XMLHTTP");
		}
		if(xmlhttp!= null)
		{
		xmlhttp.open("GET","osobe.xml",false);
		xmlhttp.send();
		xmlDokument = xmlhttp.responseXML;
		
		dohvatiPodatke(xmlDokument);
		}
	}
	
function dohvatiPodatke(xmlDokument)
{
	var emailPolje = document.getElementById("email").value;
	var sveOsobe = xmlDokument.getElementsByTagName("osoba");
	
	for(var i = 0; i < sveOsobe.length; i++)
	{
		var emailXML = sveOsobe[i].getElementsByTagName("email")[0].childNodes[0].nodeValue;
		if(emailPolje == emailXML)
		{
			var screenName = sveOsobe[i].getElementsByTagName("name")[0].childNodes[0].nodeValue;
			
			var ispis = "";
			
			ispis += "Screen name: "+screenName+";";
			document.getElementById("prikaz").innerHTML = ispis;
		}
	}
}

$(document).ready(function(){
  $('#meni ul').css({
    display: "none",
    left: "auto"
  });
  $('#meni').hover(function() {
    $(this)
      .find('ul')
      .stop(true, true)
      .slideDown('fast');
  }, function() {
    $(this)
      .find('ul')
      .stop(true,true)
      .fadeOut('fast');
  });
});

$(document).ready(function(){
  $(':button').click(function(e) {
    $(':text').each(function() {
      if($(this).val().length == 0) {
        $(this).css('border', '2px solid red');
      }
    });
    e.preventDefault();
  });
});