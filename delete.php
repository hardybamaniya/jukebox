<?php
include("conn.php");
	if(isset($_POST['deleteSong']))
	{
		$del=$_POST['del'];
		mysql_query($link,"delete from top12 where sid='$del' ");
		header("Location:homepage.php");
	}
	else if(isset($_POST['deleteAlbum']))
	{
		$del=$_POST['del'];
		mysql_query($link,"delete from homealbum where album='$del' ");
		header("Location:homepage.php");
	}
	else if(isset($_POST['deleteArtist']))
	{
		$del=$_POST['del'];
		mysql_query($link,"delete from homeartist where artist='$del' ");
		header("Location:homepage.php");
	}
	else
	{
			header("Location:homepage.php");
	}


?>