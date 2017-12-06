// JavaScript Document

function playlist(str,id)
{

	if (str.length==0)
	{
		document.getElementById("txtHint").innerHTML="";
		return;
	}
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("txtHint"+id).innerHTML=xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET","admin/createPlaylist.php?q="+str+"&p="+id,true);
	xmlhttp.send();
}
