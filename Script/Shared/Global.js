// JavaScript Document
//alert("Server request recieved!");
window.addEventListener 
(	
	"resize", function ()
	{
		BLN_DJANGO();
//		document.getElementById('demo').innerHTML = window.innerWidth;
	}
);

function BLN_ONLOAD ()
{
//	BLN_SPRY_CAROUSEL(); 
//	BLN_SPRY_FLASHCARD();	
//	BLN_SPRY_FIREFLY();		
}

function BLN_DJANGO ()
{
	BLN_SPRY_DRAWER('onResize');
	var leftpane = document.getElementsByClassName('left-pane'),
	rightpane = document.getElementsByClassName('right-pane'),
	widgetLi = document.querySelectorAll('.JSP_WIDGETS_DISPLAY li');
	if (window.innerWidth <= BLN_SPRY_DRAWER('Estate')) //768 320
	{
		var leftpanePosition = 'fixed',
		rightpaneMargin = '0 10px',
		rightpaneWidth = '95%',
		widgetLiWidth = '95%';		
	}
	else
	{
		var leftpanePosition = 'relative',		
		rightpaneMargin = '0 20px',
		rightpaneWidth = '75%',
		widgetLiWidth = '250px';				
	}
	for (var i = 0; i < leftpane.length; i++)
		leftpane[i].style.position = leftpanePosition;
	for (var i = 0; i < rightpane.length; i++)
	{
		rightpane[i].style.margin = rightpaneMargin;		
		rightpane[i].style.width = rightpaneWidth;			
	}
	for (var i = 0; i < widgetLi.length; i++)
		widgetLi[i].style.width = widgetLiWidth;	
}