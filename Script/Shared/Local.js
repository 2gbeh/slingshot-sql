// JavaScript Document
//alert("Server request recieved!");
function toggleMenuSupport ()
{
	var dom = document.getElementById('toggleMenuSupport'),bgcolor,color,text;	
	if (dom.innerHTML == 'tech support')
	{
		bgcolor = '#16BC00';
		color = '#FFF';
		text = '+234(0) 81 6996 0927';
	}
	else
	{
		bgcolor = '#FFF';
		color = '#333';
		text = 'tech support';
	}
	document.getElementById('toggleMenuSupport').style.backgroundColor = bgcolor;
	document.getElementById('toggleMenuSupport').style.color = color;
	document.getElementById('toggleMenuSupport').innerHTML = text;		
}