<?php
	include("header.php");
?>
<script>
$(document).ready(function() {
    $("#cl_home").removeClass("selected");
	$("#cl_albModule").removeClass("selected");
	$("#cl_userModule").removeClass("selected");
	$("#cl_nowModule").removeClass("selected");
	$("#cl_artModule").addClass("selected");
		
	$("table tr:even").addClass("nice");
	$("table tr").mouseover(function(){$(this).addClass("mouseon")});
	$("table tr").mouseout(function(){$(this).removeClass("mouseon")});	
});


</script>
<script>
function cimg(){
document.getElementById("cl_homeimg").src= "imgs/home.gif";
document.getElementById("cl_artimg").src= "imgs/artist2.gif";
document.getElementById("cl_albimg").src= "imgs/album.gif";
document.getElementById("cl_userimg").src= "imgs/user.gif";
document.getElementById("cl_nowimg").src= "imgs/now.gif";
	
}
window.onload = cimg;
</script>
<div class="maincontent">
	<div id="title" class="title">
		<h3>Artists</h3>
    </div>
    <?php
		
		$sql = mysql_query("SELECT * from artist");
		$c=1;
		echo "<div class='tab'>";
		echo "<div class='trow'><a href='#'><div class='one alone'>NO</div><div class='two alone'>Name</div><div class='two alone'>Artist</div><div class='one alone'>songs</div></a></div>";
		while($f = mysql_fetch_row($sql))
		{
			echo "
				<div class='trow'>
					<a href='nowplaying.php?artlist=$f[0]'>	<div class='tno'>$c</div>
						<div class='tartist'>$f[0]</div>
						<div class='talbum'>$f[1]</div>
						<div class='tsong'>$f[2]</div>
					</a>	
				</div>";	
			$c++;
			
		}
		echo "</div>";
		/*
		$sql = mysql_query("SELECT * from artist");
		
		echo"<table height='100%' width='70%' border=1 align='center'>";
		echo"<tr><td>No</td><td width='40%'>Artist</td><td width='40%'>Album</td><td>No. of Songs</td></tr>";
		$c=1;
		while($f = mysql_fetch_row($sql))
		{
			echo "<a href='#'><tr><td>$c</td><td>$f[0]<td>$f[1]</td><td>$f[2]</td></tr></a>";
			$c++;
		}
		
		echo"</table>";
		*/
	?>
    
</div>
<?php
	include("footer.php");
?>