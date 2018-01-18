$(document).ready(function()
{
	slideShow1();
});
function slideShow1()
{
    var current = $(".slajd .prvi");
	var next = current.next().length ? current.next() : current.parent().children(':first');
	
	current.hide().removeClass('prvi');
	next.fadeIn().addClass('prvi');
  
	setTimeout(slideShow1, 4000);
}
