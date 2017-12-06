<?php
	include("header.php");
?>
<script language="javascript" type="text/javascript">
	
$(document).ready(function(e) {
    $("#cl_home").removeClass("selected");
	$("#cl_artModule").removeClass("selected");
	$("#cl_userModule").removeClass("selected");
	$("#cl_albModule").removeClass("selected");
	$("#cl_nowModule").addClass("selected");
});
</script>
<script>
function cimg(){
document.getElementById("cl_homeimg").src= "imgs/home.gif";
document.getElementById("cl_artimg").src= "imgs/artist.gif";
document.getElementById("cl_albimg").src= "imgs/album.gif";
document.getElementById("cl_userimg").src= "imgs/user.gif";
document.getElementById("cl_nowimg").src= "imgs/now2.gif";
	
}
this.addEventListener("load",cimg,true);

</script>
<div id="nowMain" class="maincontent">
	<div class="image">
    	<img alt="IMAGE UNAVAILABLE"  id="imagenow" width="100%" src="image/blank.jpg" />
	</div>
    <div id="list" class="listdiv">
    	<?php
			
			if(isset($_GET["playlist"]))
			{
				$get = $_GET['playlist'];
				$sql = mysql_query("select * from $USER where pname='$get'");
				while($s = mysql_fetch_row($sql))
				{
						$a=$s[2];
		
				}
					//print_r(implode(",",$a));		
				

				$list = mysql_query("select * from jukebox where sid in ($a)");
				
			}
			else if(isset($_GET["artlist"]))
			{
				$get = $_GET['artlist'];
				$list = mysql_query("select * from jukebox where artist like '%$get%'");
				
			}
			else if(isset($_GET["search"]))
			{
				$get = $_GET['search'];
				$list = mysql_query("select * from jukebox where sid = '$get'");
				
			}
			else if(isset($_GET["play"]))
			{
				if($_GET["play"]=="top12")
				{
					$list = mysql_query("select * from top12");
				}
				else
				{
					$play=$_GET["play"];
					$list = mysql_query("select * from jukebox where album='$play'");
				}
			}
			else
			{
				$play="top12";	
				$list = mysql_query("select * from $play");
			}
			$c=0;
			echo "<div class='row'><a href='#'><div class='one alone'>NO</div><div class='two alone'>Name</div><div class='two alone'>Artist</div></a></div>";
			while($f=mysql_fetch_row($list))
			{
				$q[]=$f[3]."".$f[1];
				$i[]=$f[8];	
				$t[]=$f[2];
				$n=$c+1;
				
				echo"<span onClick='changeSRC(this)' id='$q[$c]' title='$f[8]'><div class='row'><a href='#'><div class='one'>$n</div><div class='two'>$f[2]</div><div class='two'>$f[4]</div></div></a></span>";	
				?>

            
				<?php
				$c++;
				
				
			}
		 $c=0;
		?>
    </div>
</div>
<?php
	
	include("footer.php");
?>