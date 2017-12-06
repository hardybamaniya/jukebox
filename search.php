<?php
include("conn.php");
include("header.php");
?>
<style type="text/css">
.maincontent {
	font-family: "Comic Sans MS", cursive;
	font-size: 14px;
	font-style: italic;
	-webkit-transition: border-color 4s ease-in;
	-moz-transition: border-color 4s ease-in;
	-ms-transition: border-color 4s ease-in;
	-o-transition: border-color 4s ease-in;
	transition: border-color 4s ease-in;
}
</style>

<div class="maincontent">
	<?php
	$c=0;
	if($_POST["search"])
	{
		
			$s = $_POST["search"];
			$sql = mysql_query("select * from jukebox where lower(album) like '%$s%' or lower(artist) like '%$s%' or lower(filename) like '%$s%' ");	
			echo "$s";
			
			if(!$f = mysql_fetch_row($sql))
			{
				echo "<br>No Record"; 	
			}

			while($f = mysql_fetch_row($sql))
			{$c++;
				
				echo "
				<div class='row'>
					<a href='nowplaying.php?search=$f[0]'>
						<div class='one'>$c</div>
						<div class='two'>$f[2]</div>
						<div class='three'>$f[6]</div>
					
					</a>
				</div>";
			}

	}
	else
	{
		header("Location:homepage.php");
	}	
	echo"</div>";
?>
	</table>
</div>