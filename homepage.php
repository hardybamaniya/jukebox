<?php
	include("header.php");

?>
<div id="homemain" class="maincontent">
		<div class="title">
        	<a href="nowplaying.php?play=top12"><h2>Top 11</h2></a>
        </div>
        <!-- slideshow -->
<?php
		if($USER=="admin")
		{
			echo"<div id='normal'>";//for admin
		}
		else
		{
        	echo"<div id='waterwheelCarousel'>";//for user
		}
				$count=0;
				while($row=mysqli_fetch_row($query))
				{
					$q[]=$row[3]."".$row[1];
						$i[]=$row[8];	
						$t[]=$row[2];
					echo "<div onClick='changeSrc(this)' id='$row[3]$row[1]' title='$row[2]' ><img onclick='chngimg(this)' src='$row[8]'><br>";	
							if($USER=="admin")//if admin than he/she  can delete songs from top11
							{
?>
							<form action="delete.php" method="post">
								<input type="hidden" name="del" value="<?php echo $row[0]; ?>" />
								<button value="delete"  type="submit" name="deleteSong">delete</button>
							</form>
<?php
							}
					echo "</div>";
					$count++;
				
				}
				if($USER=="admin" && $count<11)// if admin login than he can insert new songs
				{
			
?>
				<br /><div><a href="#insertDiv"  class="play-icon popup-with-zoom-anim">insert</a></div>
                    
                    <div id="insertDiv" style="height:100%; width:100%;"  class="modalDialog">
	               		<div>
                        <a href="#close" title="Close" class="close" style="padding:0px; margin:5px;">X</a>
                        <input type="text" name="txt" onKeyUp="showSong(this.value);"><br><br>
                        <div id="txtHint"><b>Text will be display here</b></div>
                        </div>
                    </div>

<?php 
			}				
?>
        </div>
        <div class="title" style="z-index:inherit; height:70px; width:100%; position:relative; padding-top:250px;">
			<a href="album.php"><h2>New Realeses</h2></a>

    	</div>
<?php
		$sql = mysqli_query($link,"SELECT * from homealbum limit 0,5");
		$c=0;
		echo "<br><div class='rows'>";
		while($f = mysqli_fetch_row($sql))
		{
			echo "<div class='albumImg'><a href='nowplaying.php?play=$f[0]'><img src='$f[3]' height='200' width='196'>$f[0]<br>Songs($f[1])</a>";
										if($USER=="admin")
										{
?>
                                    	<form action="delete.php" method="post">
                                        	<input type="hidden" name="del" value="<?php echo $f[0]; ?>" />
                                        	<button value="delete"  type="submit" name="deleteAlbum">delete</button>
                                    	</form>
<?php
										}
			echo"</div>";	
			$c++;
		}		
		if($USER=="admin" && $c<5)
		{

?>
					<a href="#insertDiv2" class="play-icon popup-with-zoom-anim">insert</a>
                    
                    <div id="insertDiv2" class="modalDialog">
	               		<div>
                        <a href="#close" title="Close" class="close" style="padding:0px; margin:5px;">X</a>
                        <input type="text" name="txt" onKeyUp="showAlbum(this.value);"><br><br>
                        <div id="txtHint"><b>Text will be display here</b></div>
                        </div>
                    </div>

<?php 
		}
?>
  
		</div>
	  <div class="title" style="z-index:inherit; margin-top:50px;  width:100%; position:relative;">
			<a href="artist.php"><h2>Artists</h2></a>

    	</div>
<?php
		$sql = mysqli_query($link,"select * from homeartist limit 0,4");
		$c=0;
		echo "            <br><div class='rows'>";
		while($f = mysqli_fetch_row($sql))
		{
			echo "<div class='artistImg albumImg'><a href='nowplaying.php?play=$f[3]'><img src='$f[0]' height='300' width='250'><br>$f[1]<br>Songs($f[2])</a>";
										if($USER=="admin")
										{
?>
                                    	<form action="delete.php" method="post">
                                        	<input type="hidden" name="del" value="<?php echo $f[1]; ?>" />
                                        	<button value="delete"  type="submit" name="deleteArtist">delete</button>
                                    	</form>
<?php
										}
			echo"</div>";	
			$c++;
		}
		if($USER=="admin"&& $c<4)
		{

?>
					<a href="#insertDiv3" class="play-icon popup-with-zoom-anim">insert</a>
                    
                    <div id="insertDiv3" class="modalDialog">
	               		<div>
                        <a href="#close" title="Close" class="close" style="padding:0px; margin:5px;">X</a>
                        <input type="text" name="txt" onKeyUp="showArtist(this.value);"><br><br>
                        <div id="txtHint"><b>Text will be display here</b></div>
                        </div>
                    </div>

<?php 
		}
	include("footer.php");
?>