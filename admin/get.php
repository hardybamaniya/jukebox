<?php
include("conn.php");

if(isset($_POST['song']))//to add album in database and homepage
{
	session_start();
	$user= $_SESSION['user'];
	$p= $_SESSION['play'];

	$d=$_POST['song'];

	$query = mysql_query("select sid from jukebox where title='$d'");
	$q = mysql_query("select sid from $user where pname='$p'");
	
	echo $p;
	
	$f=mysql_fetch_row($query);
	$sids=mysql_fetch_row($q);// to fatch sid from user playlist
	
	if(mysql_query("update $user set sid='$f[0],$sids[0]' where pname='$p'"))
	{
			header("Location:../user.php");	
	}
	
}
else if(isset($_POST['insAlb']))//to add album in database and homepage
{
	$d=$_POST['insAlb'];

	$query = mysql_query("select album,count('sid'),year,image from jukebox where album='$d' group by album");

	$f=mysql_fetch_row($query);
	print_r($f);
	if(mysql_query("insert into homealbum values('$f[0]','$f[1]','$f[2]','$f[3]')"))
	{
		header("Location:../homepage.php");	
	}
	echo "select album,count('sid'),year,image from jukebox where album='$d' group by album";	
}
else if(isset($_POST['insArt']))//to add Artist in database and homepage
{
	$d=$_POST['insArt'];
	$query = mysql_query("select image,artist,count(artist),album from jukebox where artist='$d' group by artist");

	$f=mysql_fetch_row($query);
	print_r($f);
	if(mysql_query("insert into homeartist values('$f[0]','$f[1]','$f[2]','$f[3]')"))
	{
		header("Location:../homepage.php");	
	}
//	echo "select image,artist,count(artist),album from jukebox where artist='$d' group by artist";
	
}
else if(isset($_POST['insSong']))//to add Songs in database and homepage
{
	$d=$_POST['insSong'];
	$query = mysql_query("select * from jukebox where title='$d'");

	$f=mysql_fetch_row($query);
	print_r($f);
	
	if(mysql_query("insert into top12 values('$f[0]','$f[1]','$f[2]','$f[3]','$f[4]','$f[5]','$f[6]','$f[7]','$f[8]')"))
	{
		header("Location:../homepage.php");	
	}
//	echo "select image,artist,count(artist),album from jukebox where artist='$d' group by artist";
	
}
else
{
		header("Location:../homepage.php");	
	
}


?>