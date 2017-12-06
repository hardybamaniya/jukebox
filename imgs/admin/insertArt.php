<?php
include("conn.php");
$query = mysql_query("select image,artist,count(artist),album from jukebox group by artist");
$a[][]="A";
while($f=mysql_fetch_row($query))
{
	$a[0][]=$f[0];
	$a[1][]=$f[1];
	$a[2][]=$f[2];
	$a[3][]=$f[3];
}

// Fill up array with names

// get the q parameter from URL
$q=$_GET["q"];
$hint="";

// lookup all hints from array if $q is different from "" 
if ($q !== "")
{
	$q=strtolower($q);
	$len=strlen($q);

	foreach($a[1] as $name)
	{
		$c=0;
		if (stristr($q, substr($name,0,$len)))
		{
			if ($hint === "")
			{	$hint = "<div><form action='admin/get.php' method='post'>$name
			<button value='$name' type='submit' name='insArt'>insert</button></form></div>";	}
			else
			{	$hint .= "<div><form action='admin/get.php' method='post'>$name
			<button value='$name' type='submit' name='insArt'>insert</button></form></div>";	}
		}
		$c++;
	}

}




// Output "no suggestion" if no hint were found or output the correct values 
echo $hint==="" ? "no suggestion" : $hint;


?>