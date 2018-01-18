function prijava()
{
	var ime = document.getElementById("tbIme");
	var prezime = document.getElementById("tbPrezime");
	var email = document.getElementById("tbMail");
	var telefon = document.getElementById("tbTelefon");
	
	var reIme = /^[A-Z]{1}[a-z]{2,16}$/;
	var rePrezime = /^[A-Z]{1}[a-z]{2,19}$/;
	var reMail = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;
	var reTelefon = /^06[0-9]\/[0-9]{6,7}$/;
	
	var greske = new Array();
	var podaci = new Array();
	
	if(!ime.value.match(reIme))
	{
		greske.push("Unesite pravilno ime!");
	}
	else
	{
		podaci.push(ime.value);
	}
	if(!prezime.value.match(rePrezime))
	{
		greske.push("Unesite pravilno prezime!");
	}
	else
	{
		podaci.push(prezime.value);
	}
	if(!email.value.match(reMail))
	{
		greske.push("Unesite pravilno svoju email adresu!");
	}
	else
	{
		podaci.push(email.value);
	}
	if(!telefon.value.match(reTelefon))
	{
		greske.push("Unesite validan broj telefona!");
	}
	else
	{
		podaci.push(telefon.value);
	}
	var divPodaci = document.getElementById("podaci");
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