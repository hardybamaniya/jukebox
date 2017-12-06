<?php include("header.php");
$profile = mysql_query("select * from register where uname='$USER'");
$fetchProfile = mysql_fetch_row($profile);

$table=mysql_query("CREATE TABLE IF NOT EXISTS `$USER` 
							(
  							`pid` int(11) NOT NULL AUTO_INCREMENT,
  							`pname` varchar(40) NOT NULL ,
  							`sid` varchar(40) NOT NULL,
  							PRIMARY KEY (`pid`),
							UNIQUE KEY `pname` (`pname`)
							)");
$fetchPlaylist = mysql_query("select * from $USER");
$playlist="";
//	create user table and its playlist
		if(isset($_POST['submit']))
		{
			$playlist = $_POST['pname'];
			if($table)
			{
				mysql_query("insert into $USER values('','$playlist','0')")	;
			}
		}
?>

    	<div  class="maincontent">
        <div class="userprofile">
        		<div id="image" class="user" align="center">
            		<img alt="NO PROFILE PIC"  src="<?php echo "$fetchProfile[6]";?>" />
        		</div>
           		 <div class="user">
             			 <h2>Name:<?php echo "<span>$fetchProfile[1]</span>";?> </h2>
              			<h2>Email:<?php echo "<span>$fetchProfile[4]</span>";?></h2>
              			<h2>Gender:<?php echo "<span>$fetchProfile[3]</span>";?></h2>
              			<h2>Contact number:<?php echo "<span>$fetchProfile[5]</span>";?></h2>
              			<h2>Country:<?php echo "<span>$fetchProfile[7]</span>";?></h2>
             		</div>
        </div>
         <div class="ulist userprofile">
         	 <h1>your playlist</h1>
             <div>
<?php
		
				while($f=mysql_fetch_row($fetchPlaylist)) 
				{
					echo "<div class='trow'><span class='tsong'> $f[0] </span><span class='talbum'> $f[1]     </span><span><a href='#$f[0]'  class='play-icon popup-with-zoom-anim' ><div class='two'>Insert Songs</div></a></span><a href='nowplaying.php?playlist=$f[1]'><div class='tsong' style='width:auto; padding-left:5px;padding-right:5px;'>play</div></a></div>";
				
				
?>
             	</div>
                   <div id="<?php echo $f[0]; ?>"  class="modalDialog">
	               		<div>
                        <a href="#close" title="Close" class="close" style="padding:0px; margin:5px;">X</a>
                        
                        ADD: <?php echo $f[1]; ?><br /><input type="text" name="txt" id="<?php echo $f[1]; ?>" onKeyUp="playlist(this.value,this.id);"><br><br>
                        <div id="txtHint<?php echo $f[1]; ?>"><b>Text will be display here</b></div>
                        </div>
                    </div>
                <div>
<?php
				}
			
				if($USER)//if user login than he/she  can create songplaylist
							{
?>		
				<br />    
                	<h2>CREATE PLAYLIST</h2>
                	<form action="" method="post">
                        <input type="text" name="pname">
                        <input type="submit" name="submit">
                     </form>
                     </div>

<?php
							}
?>             </div>
         </div>
<?php //include("footer.php");?>