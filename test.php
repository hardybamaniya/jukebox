<?php
include("conn.php");
$get = $_GET['playlist'];
echo $get;

$sql = mysql_query("select * from hardik where pname='$get'");
while($s = mysql_fetch_row($sql))
{
	$a=$s[2];
		
}
//print_r(implode(",",$a));
print_r($a);

$q = mysql_query("select * from jukebox where sid in ($a)");
while($c= mysql_fetch_row($q))
{
	echo $c[2]."<br>";
}

?>