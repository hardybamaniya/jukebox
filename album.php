<?php
	include("header.php");
?>
<script>
$(document).ready(function(e) {
    $("#cl_home").removeClass("selected");
	$("#cl_artModule").removeClass("selected");
	$("#cl_userModule").removeClass("selected");
	$("#cl_nowModule").removeClass("selected");
	$("#cl_albModule").addClass("selected");
		
});
</script>
<script>
function cimg(){
document.getElementById("cl_homeimg").src= "imgs/home.gif";
document.getElementById("cl_artimg").src= "imgs/artist.gif";
document.getElementById("cl_albimg").src= "imgs/album2.gif";
document.getElementById("cl_userimg").src= "imgs/user.gif";
document.getElementById("cl_nowimg").src= "imgs/now.gif";
	
}
window.onload = cimg;
</script>
<div class="maincontent">
	<div id="title" class="title">
		<h3>Albums</h3>
    </div>
    <?php
		$q = array();
		$sql = mysql_query("SELECT * from album");
		$c=0;
		echo "<div class='rows'>";
		while($f = mysql_fetch_row($sql))
		{
			echo "<div class='albumImg'>
				<a href='nowplaying.php?play=$f[0]'><img src='$f[3]' height='200' width='196'><div>$f[0]<br>Songs($f[1])</div></a></div>";	
			$c++;
			if($c==5)
			{
				echo "</div><div class='rows'>";
				$c=-1;
			}
		}
		echo "</div>";
	?>
    
</div>
<?php
	include("footer.php");
?>