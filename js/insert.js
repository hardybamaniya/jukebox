// JavaScript Document
function showArtist(str)
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
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET","admin/insertArt.php?q="+str,true);
	xmlhttp.send();
}
function showAlbum(str)
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
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET","admin/insertAlb.php?q="+str,true);
	xmlhttp.send();
}
function showSong(str)
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
			document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			
		}
	}
	xmlhttp.open("GET","admin/insertSong.php?q="+str,true);
	xmlhttp.send();
}