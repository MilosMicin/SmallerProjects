$(document).ready(function()
{
	slideShow1();
	slideShow2();
	slideShow3();
	slideShow4();
	slideShow5();
	slajder();
});
function slideShow1()
{
	var current = $(".popularni_naslovi .prvi");
	var next = current.next().length ? current.next() : current.parent().children(':first');
	
	current.hide().removeClass('prvi');
	next.fadeIn().addClass('prvi');
  
	setTimeout(slideShow1, 5000);
}
function slideShow2()
{
	var current = $(".popularni_naslovi .drugi");
	var next = current.next().length ? current.next() : current.parent().children(':first');
	
	current.hide().removeClass('drugi');
	next.fadeIn().addClass('drugi');
  
	setTimeout(slideShow2, 5000);
}
function slideShow3()
{
	var current = $(".popularni_naslovi .treci");
	var next = current.next().length ? current.next() : current.parent().children(':first');
	
	current.hide().removeClass('treci');
	next.fadeIn().addClass('treci');
  
	setTimeout(slideShow3, 5000);
}
function slideShow4()
{
	var current = $(".popularni_naslovi .cetvrti");
	var next = current.next().length ? current.next() : current.parent().children(':first');
	
	current.hide().removeClass('cetvrti');
	next.fadeIn().addClass('cetvrti');
  
	setTimeout(slideShow4, 5000);
}
function slideShow5()
{
	var current = $(".popularni_naslovi .peti");
	var next = current.next().length ? current.next() : current.parent().children(':first');
	
	current.hide().removeClass('peti');
	next.fadeIn().addClass('peti');
  
	setTimeout(slideShow5, 5000);
}
function slajder()
{
	var current = $("#slajder .slajd");
	var next = current.next().length ? current.next() : current.parent().children(':first');
	
	current.hide().removeClass('slajd');
	next.fadeIn().addClass('slajd');
  
	setTimeout(slajder, 4000);
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
			$('.knjiga:even').css('background-color','#dddddd')
		});